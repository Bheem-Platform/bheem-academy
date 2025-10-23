"""
Course API Endpoints
Handles course catalog, enrollment, and progress tracking
"""
from fastapi import APIRouter, Depends, HTTPException, status, Query, Header
from fastapi.responses import HTMLResponse
from sqlalchemy.orm import Session
from sqlalchemy import select, func, and_, or_, desc
from typing import List, Optional
import os
import sys
from datetime import datetime
import time

# Add parent directory to path
sys.path.append(os.path.dirname(os.path.dirname(os.path.abspath(__file__))))

from core.database import get_erp_db, get_moodle_db
from models.moodle_models import (
    Course,
    CourseCategory as MoodleCourseCategory,
    Enrol,
    UserEnrolment,
    CourseModule,
    CourseModulesCompletion
)
from models.erp_models import UserMapping
from schemas.course import (
    CourseBasic,
    CourseDetail,
    CourseCategory,
    EnrollmentRequest,
    EnrollmentResponse,
    UnenrollRequest,
    CourseProgress,
    MyCourse,
    CourseSearchFilter,
    CourseListResponse,
    CourseModuleCompletion
)
from api.auth import get_current_user

router = APIRouter()


async def get_optional_current_user(
    authorization: Optional[str] = Header(None),
    erp_db: Session = Depends(get_erp_db)
) -> Optional[dict]:
    """
    Extract and validate user from JWT token - returns None if no token provided
    Used for public endpoints that enhance functionality when authenticated
    """
    if not authorization or not authorization.startswith("Bearer "):
        return None
    
    try:
        # Use the existing get_current_user function
        from api.auth import get_current_user
        token = authorization.replace("Bearer ", "")
        from core.auth_client import BheemPlatformAuthClient
        auth_client = BheemPlatformAuthClient()
        user_data = await auth_client.get_current_user(token)
        return user_data
    except:
        # If token is invalid, just return None (don't fail the request)
        return None


@router.get("/categories", response_model=List[CourseCategory])
async def get_categories(
    moodle_db: Session = Depends(get_moodle_db)
):
    """
    Get all course categories
    Public endpoint - no authentication required
    """
    categories = moodle_db.query(MoodleCourseCategory).filter(
        MoodleCourseCategory.visible == 1
    ).order_by(MoodleCourseCategory.sortorder).all()

    return [
        CourseCategory(
            id=cat.id,
            name=cat.name,
            description=cat.description,
            parent=cat.parent,
            coursecount=cat.coursecount
        )
        for cat in categories
    ]


@router.get("/catalog", response_model=CourseListResponse)
async def get_course_catalog(
    search: Optional[str] = Query(None, description="Search in course name and description"),
    category_id: Optional[int] = Query(None, description="Filter by category"),
    visible_only: bool = Query(True, description="Show only visible courses"),
    page: int = Query(1, ge=1),
    page_size: int = Query(20, ge=1, le=100),
    moodle_db: Session = Depends(get_moodle_db)
):
    """
    Get paginated course catalog with search and filters
    Public endpoint - no authentication required
    """
    # Build query
    query = moodle_db.query(Course).filter(Course.id > 1)  # Exclude site course (id=1)

    # Apply filters
    if visible_only:
        query = query.filter(Course.visible == 1)

    if category_id:
        query = query.filter(Course.category == category_id)

    if search:
        search_pattern = f"%{search}%"
        query = query.filter(
            or_(
                Course.fullname.ilike(search_pattern),
                Course.shortname.ilike(search_pattern),
                Course.summary.ilike(search_pattern)
            )
        )

    # Get total count
    total = query.count()

    # Apply pagination
    offset = (page - 1) * page_size
    courses = query.order_by(desc(Course.timecreated)).offset(offset).limit(page_size).all()

    # Calculate total pages
    total_pages = (total + page_size - 1) // page_size

    return CourseListResponse(
        courses=[
            CourseBasic(
                id=course.id,
                fullname=course.fullname,
                shortname=course.shortname,
                category=course.category,
                summary=course.summary,
                visible=bool(course.visible),
                format=course.format
            )
            for course in courses
        ],
        total=total,
        page=page,
        page_size=page_size,
        total_pages=total_pages
    )


@router.get("/{course_id}", response_model=CourseDetail)
async def get_course_detail(
    course_id: int,
    current_user: Optional[dict] = Depends(get_optional_current_user),
    moodle_db: Session = Depends(get_moodle_db),
    erp_db: Session = Depends(get_erp_db)
):
    """
    Get detailed course information including enrollment status
    Public endpoint - authentication optional (shows enrollment status if authenticated)
    """
    # Get course
    course = moodle_db.query(Course).filter(Course.id == course_id).first()
    if not course:
        raise HTTPException(
            status_code=status.HTTP_404_NOT_FOUND,
            detail="Course not found"
        )

    # Get category name
    category = moodle_db.query(MoodleCourseCategory).filter(
        MoodleCourseCategory.id == course.category
    ).first()
    category_name = category.name if category else None

    # Default values for unauthenticated users
    is_enrolled = False
    enrollment_status = None
    completion_percentage = 0.0

    # Get enrollment status only if user is authenticated
    if current_user:
        user_id = current_user.get("id")
        mapping = erp_db.query(UserMapping).filter(UserMapping.erp_user_id == user_id).first()
        moodle_user_id = mapping.moodle_user_id if mapping else None

        if moodle_user_id:
            # Find enrollment method for this course
            enrol = moodle_db.query(Enrol).filter(
                and_(
                    Enrol.courseid == course_id,
                    Enrol.status == 0  # Active enrollment method
                )
            ).first()

            if enrol:
                # Check if user is enrolled
                user_enrol = moodle_db.query(UserEnrolment).filter(
                    and_(
                        UserEnrolment.enrolid == enrol.id,
                        UserEnrolment.userid == moodle_user_id,
                        UserEnrolment.status == 0  # Active enrollment
                    )
                ).first()

                if user_enrol:
                    is_enrolled = True
                    enrollment_status = "active"

            # Calculate completion percentage only for enrolled users
            if is_enrolled:
                total_modules = moodle_db.query(func.count(CourseModule.id)).filter(
                    and_(
                        CourseModule.course == course_id,
                        CourseModule.visible == 1,
                        CourseModule.deletioninprogress == 0
                    )
                ).scalar() or 0

                if total_modules > 0:
                    completed_modules = moodle_db.query(func.count(CourseModulesCompletion.id)).filter(
                        and_(
                            CourseModulesCompletion.userid == moodle_user_id,
                            CourseModulesCompletion.completionstate > 0,
                            CourseModule.id == CourseModulesCompletion.coursemoduleid,
                            CourseModule.course == course_id
                        )
                    ).scalar() or 0

                    completion_percentage = (completed_modules / total_modules) * 100

    return CourseDetail(
        id=course.id,
        category=course.category,
        category_name=category_name,
        fullname=course.fullname,
        shortname=course.shortname,
        summary=course.summary,
        summary_format=course.summaryformat,
        format=course.format,
        startdate=course.startdate,
        enddate=course.enddate,
        visible=bool(course.visible),
        enablecompletion=bool(course.enablecompletion),
        lang=None,  # Course model does not have lang field
        timecreated=course.timecreated,
        timemodified=course.timemodified,
        is_enrolled=is_enrolled,
        enrollment_status=enrollment_status,
        completion_percentage=round(completion_percentage, 2)
    )


@router.post("/enroll", response_model=EnrollmentResponse)
async def enroll_in_course(
    request: EnrollmentRequest,
    current_user: dict = Depends(get_current_user),
    moodle_db: Session = Depends(get_moodle_db),
    erp_db: Session = Depends(get_erp_db)
):
    """
    Enroll user in a course
    Requires authentication
    """
    course_id = request.course_id

    # Get Moodle user ID
    user_id = current_user.get("id")
    mapping = erp_db.query(UserMapping).filter(UserMapping.erp_user_id == user_id).first()

    if not mapping:
        raise HTTPException(
            status_code=status.HTTP_404_NOT_FOUND,
            detail="User mapping not found"
        )

    moodle_user_id = mapping.moodle_user_id

    # Check if course exists
    course = moodle_db.query(Course).filter(Course.id == course_id).first()
    if not course:
        raise HTTPException(
            status_code=status.HTTP_404_NOT_FOUND,
            detail="Course not found"
        )

    # Find enrollment method (prefer 'manual' or 'self')
    enrol = moodle_db.query(Enrol).filter(
        and_(
            Enrol.courseid == course_id,
            Enrol.status == 0,  # Active
            or_(Enrol.enrol == "manual", Enrol.enrol == "self")
        )
    ).first()

    if not enrol:
        raise HTTPException(
            status_code=status.HTTP_400_BAD_REQUEST,
            detail="Course enrollment is not available"
        )

    # Check if already enrolled
    existing_enrollment = moodle_db.query(UserEnrolment).filter(
        and_(
            UserEnrolment.enrolid == enrol.id,
            UserEnrolment.userid == moodle_user_id
        )
    ).first()

    if existing_enrollment:
        if existing_enrollment.status == 0:
            return EnrollmentResponse(
                success=True,
                message="Already enrolled in this course",
                course_id=course_id,
                user_id=moodle_user_id,
                enrollment_id=existing_enrollment.id
            )
        else:
            # Reactivate enrollment
            existing_enrollment.status = 0
            existing_enrollment.timemodified = int(time.time())
            moodle_db.commit()

            return EnrollmentResponse(
                success=True,
                message="Enrollment reactivated",
                course_id=course_id,
                user_id=moodle_user_id,
                enrollment_id=existing_enrollment.id
            )

    # Create new enrollment
    current_time = int(time.time())
    new_enrollment = UserEnrolment(
        status=0,  # Active
        enrolid=enrol.id,
        userid=moodle_user_id,
        timestart=current_time,
        timeend=0,  # No end date
        modifierid=0,
        timecreated=current_time,
        timemodified=current_time
    )

    moodle_db.add(new_enrollment)
    moodle_db.commit()
    moodle_db.refresh(new_enrollment)

    return EnrollmentResponse(
        success=True,
        message=f"Successfully enrolled in {course.fullname}",
        course_id=course_id,
        user_id=moodle_user_id,
        enrollment_id=new_enrollment.id
    )


@router.post("/unenroll")
async def unenroll_from_course(
    request: UnenrollRequest,
    current_user: dict = Depends(get_current_user),
    moodle_db: Session = Depends(get_moodle_db),
    erp_db: Session = Depends(get_erp_db)
):
    """
    Unenroll user from a course
    Requires authentication
    """
    course_id = request.course_id

    # Get Moodle user ID
    user_id = current_user.get("id")
    mapping = erp_db.query(UserMapping).filter(UserMapping.erp_user_id == user_id).first()

    if not mapping:
        raise HTTPException(
            status_code=status.HTTP_404_NOT_FOUND,
            detail="User mapping not found"
        )

    moodle_user_id = mapping.moodle_user_id

    # Find enrollment
    enrol = moodle_db.query(Enrol).filter(
        and_(
            Enrol.courseid == course_id,
            Enrol.status == 0
        )
    ).first()

    if not enrol:
        raise HTTPException(
            status_code=status.HTTP_404_NOT_FOUND,
            detail="Enrollment method not found"
        )

    user_enrol = moodle_db.query(UserEnrolment).filter(
        and_(
            UserEnrolment.enrolid == enrol.id,
            UserEnrolment.userid == moodle_user_id,
            UserEnrolment.status == 0
        )
    ).first()

    if not user_enrol:
        raise HTTPException(
            status_code=status.HTTP_404_NOT_FOUND,
            detail="You are not enrolled in this course"
        )

    # Suspend enrollment (don't delete to preserve history)
    user_enrol.status = 1  # Suspended
    user_enrol.timemodified = int(time.time())
    moodle_db.commit()

    return {
        "success": True,
        "message": "Successfully unenrolled from course",
        "course_id": course_id
    }


@router.get("/my-courses", response_model=List[MyCourse])
async def get_my_courses(
    current_user: dict = Depends(get_current_user),
    moodle_db: Session = Depends(get_moodle_db),
    erp_db: Session = Depends(get_erp_db)
):
    """
    Get all courses the current user is enrolled in
    Requires authentication
    """
    # Get Moodle user ID
    user_id = current_user.get("id")
    mapping = erp_db.query(UserMapping).filter(UserMapping.erp_user_id == user_id).first()

    if not mapping:
        return []

    moodle_user_id = mapping.moodle_user_id

    # Get enrolled courses
    enrolled_courses = moodle_db.query(Course, UserEnrolment, MoodleCourseCategory).join(
        Enrol, Course.id == Enrol.courseid
    ).join(
        UserEnrolment, and_(
            UserEnrolment.enrolid == Enrol.id,
            UserEnrolment.userid == moodle_user_id,
            UserEnrolment.status == 0  # Active enrollments
        )
    ).outerjoin(
        MoodleCourseCategory, Course.category == MoodleCourseCategory.id
    ).filter(
        Course.visible == 1
    ).order_by(desc(UserEnrolment.timecreated)).all()

    my_courses = []
    for course, enrollment, category in enrolled_courses:
        # Calculate progress
        total_modules = moodle_db.query(func.count(CourseModule.id)).filter(
            and_(
                CourseModule.course == course.id,
                CourseModule.visible == 1,
                CourseModule.deletioninprogress == 0
            )
        ).scalar() or 0

        progress = 0.0
        if total_modules > 0:
            completed_modules = moodle_db.query(func.count(CourseModulesCompletion.id)).filter(
                and_(
                    CourseModulesCompletion.userid == moodle_user_id,
                    CourseModulesCompletion.completionstate > 0,
                    CourseModule.id == CourseModulesCompletion.coursemoduleid,
                    CourseModule.course == course.id
                )
            ).scalar() or 0

            progress = (completed_modules / total_modules) * 100

        my_courses.append(
            MyCourse(
                id=course.id,
                fullname=course.fullname,
                shortname=course.shortname,
                summary=course.summary,
                category_name=category.name if category else None,
                enrollment_date=datetime.fromtimestamp(enrollment.timecreated) if enrollment.timecreated else None,
                last_access=None,  # TODO: Get from mdl_user_lastaccess table
                progress=round(progress, 2),
                visible=bool(course.visible)
            )
        )

    return my_courses


@router.get("/{course_id}/progress", response_model=CourseProgress)
async def get_course_progress(
    course_id: int,
    current_user: dict = Depends(get_current_user),
    moodle_db: Session = Depends(get_moodle_db),
    erp_db: Session = Depends(get_erp_db)
):
    """
    Get detailed progress for a specific course
    Requires authentication
    """
    # Get Moodle user ID
    user_id = current_user.get("id")
    mapping = erp_db.query(UserMapping).filter(UserMapping.erp_user_id == user_id).first()

    if not mapping:
        raise HTTPException(
            status_code=status.HTTP_404_NOT_FOUND,
            detail="User mapping not found"
        )

    moodle_user_id = mapping.moodle_user_id

    # Get course
    course = moodle_db.query(Course).filter(Course.id == course_id).first()
    if not course:
        raise HTTPException(
            status_code=status.HTTP_404_NOT_FOUND,
            detail="Course not found"
        )

    # Get enrollment info
    enrol = moodle_db.query(Enrol).filter(
        and_(Enrol.courseid == course_id, Enrol.status == 0)
    ).first()

    enrollment = None
    if enrol:
        enrollment = moodle_db.query(UserEnrolment).filter(
            and_(
                UserEnrolment.enrolid == enrol.id,
                UserEnrolment.userid == moodle_user_id,
                UserEnrolment.status == 0
            )
        ).first()

    if not enrollment:
        raise HTTPException(
            status_code=status.HTTP_403_FORBIDDEN,
            detail="You are not enrolled in this course"
        )

    # Calculate progress
    total_modules = moodle_db.query(func.count(CourseModule.id)).filter(
        and_(
            CourseModule.course == course_id,
            CourseModule.visible == 1,
            CourseModule.deletioninprogress == 0
        )
    ).scalar() or 0

    completed_modules = 0
    if total_modules > 0:
        completed_modules = moodle_db.query(func.count(CourseModulesCompletion.id)).filter(
            and_(
                CourseModulesCompletion.userid == moodle_user_id,
                CourseModulesCompletion.completionstate > 0,
                CourseModule.id == CourseModulesCompletion.coursemoduleid,
                CourseModule.course == course_id
            )
        ).scalar() or 0

    completion_percentage = (completed_modules / total_modules * 100) if total_modules > 0 else 0.0

    return CourseProgress(
        course_id=course.id,
        course_name=course.fullname,
        enrolled_date=datetime.fromtimestamp(enrollment.timecreated) if enrollment.timecreated else None,
        completion_percentage=round(completion_percentage, 2),
        total_activities=total_modules,
        completed_activities=completed_modules,
        last_access=None,  # TODO: Get from mdl_user_lastaccess
        grade=None  # TODO: Get from mdl_grade_grades
    )


@router.get("/index-page", response_class=HTMLResponse)
async def course_index_page(
    moodle_db: Session = Depends(get_moodle_db)
):
    """
    Course index page with dev design
    Returns complete HTML page with categories and courses
    """
    from fastapi.responses import HTMLResponse
    
    # Fetch categories with courses
    categories = moodle_db.query(MoodleCourseCategory).filter(
        MoodleCourseCategory.visible == 1
    ).order_by(MoodleCourseCategory.sortorder, MoodleCourseCategory.name).all()

    categories_html = ""

    for category in categories:
        # Fetch courses for this category
        courses = moodle_db.query(Course).filter(
            and_(
                Course.category == category.id,
                Course.visible == 1
            )
        ).order_by(Course.sortorder, Course.fullname).all()

        if not courses:
            continue

        # Build courses HTML
        courses_html = ""
        for course in courses:
            courses_html += f"""
            <div class="course-card">
                <div class="course-card-inner">
                    <div class="course-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <div class="course-info">
                        <h4>{course.fullname}</h4>
                        <p class="course-shortname">{course.shortname or ''}</p>
                    </div>
                    <a href="https://newdesign.bheem.cloud/course/view.php?id={course.id}" class="course-link">
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            """

        categories_html += f"""
        <div class="category-section">
            <div class="category-header">
                <h2 class="category-title">
                    <i class="fas fa-folder-open"></i>
                    {category.name}
                </h2>
                <span class="course-count">{len(courses)} courses</span>
            </div>
            <div class="courses-grid">
                {courses_html}
            </div>
        </div>
        """

    html_content = f"""
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Categories - Bheem Academy</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }}

        body {{
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 2rem;
        }}

        .container {{
            max-width: 1400px;
            margin: 0 auto;
        }}

        .page-header {{
            text-align: center;
            color: white;
            margin-bottom: 3rem;
        }}

        .page-header h1 {{
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 1rem;
            text-shadow: 0 2px 20px rgba(0,0,0,0.2);
        }}

        .page-header p {{
            font-size: 1.2rem;
            opacity: 0.9;
        }}

        .category-section {{
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 2.5rem;
            margin-bottom: 2.5rem;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        }}

        .category-header {{
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 3px solid #667eea;
        }}

        .category-title {{
            font-size: 2rem;
            font-weight: 700;
            color: #2d3748;
            display: flex;
            align-items: center;
            gap: 1rem;
        }}

        .category-title i {{
            color: #667eea;
            font-size: 1.8rem;
        }}

        .course-count {{
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 0.5rem 1.5rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.9rem;
        }}

        .courses-grid {{
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 1.5rem;
        }}

        .course-card {{
            background: white;
            border: 2px solid #e2e8f0;
            border-radius: 15px;
            padding: 1.5rem;
            transition: all 0.3s ease;
            cursor: pointer;
        }}

        .course-card:hover {{
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
            border-color: #667eea;
        }}

        .course-card-inner {{
            display: flex;
            align-items: center;
            gap: 1rem;
        }}

        .course-icon {{
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            flex-shrink: 0;
        }}

        .course-info {{
            flex: 1;
        }}

        .course-info h4 {{
            font-size: 1.1rem;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 0.5rem;
            line-height: 1.4;
        }}

        .course-shortname {{
            font-size: 0.85rem;
            color: #718096;
            line-height: 1.5;
        }}

        .course-link {{
            background: #667eea;
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            flex-shrink: 0;
        }}

        .course-link:hover {{
            background: #764ba2;
            transform: scale(1.1);
        }}

        .back-button {{
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            margin-bottom: 2rem;
        }}

        .back-button:hover {{
            background: rgba(255, 255, 255, 0.3);
            transform: translateX(-5px);
        }}

        @media (max-width: 768px) {{
            .courses-grid {{
                grid-template-columns: 1fr;
            }}

            .page-header h1 {{
                font-size: 2rem;
            }}

            .category-title {{
                font-size: 1.5rem;
            }}

            .category-header {{
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }}
        }}
    </style>
</head>
<body>
    <div class="container">
        <a href="https://newdesign.bheem.cloud/" class="back-button">
            <i class="fas fa-arrow-left"></i>
            Back to Home
        </a>

        <div class="page-header">
            <h1>Course Categories</h1>
            <p>Explore our comprehensive range of courses across different categories</p>
        </div>

        {categories_html}
    </div>
</body>
</html>
"""

    return HTMLResponse(content=html_content)

"""
Course API Endpoints
Handles course catalog, enrollment, and progress tracking
"""
from fastapi import APIRouter, Depends, HTTPException, status, Query
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


@router.get("/categories", response_model=List[CourseCategory])
async def get_categories(
    moodle_db: Session = Depends(get_moodle_db)
):
    """
    Get all course categories
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
    current_user: dict = Depends(get_current_user),
    moodle_db: Session = Depends(get_moodle_db),
    erp_db: Session = Depends(get_erp_db)
):
    """
    Get detailed course information including enrollment status
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

    # Get Moodle user ID
    user_id = current_user.get("id")
    mapping = erp_db.query(UserMapping).filter(UserMapping.erp_user_id == user_id).first()
    moodle_user_id = mapping.moodle_user_id if mapping else None

    # Check enrollment status
    is_enrolled = False
    enrollment_status = None

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

    # Calculate completion percentage
    completion_percentage = 0.0
    if is_enrolled and moodle_user_id:
        # Count total activities
        total_modules = moodle_db.query(func.count(CourseModule.id)).filter(
            and_(
                CourseModule.course == course_id,
                CourseModule.visible == 1,
                CourseModule.deletioninprogress == 0
            )
        ).scalar() or 0

        if total_modules > 0:
            # Count completed activities
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
        lang=course.lang,
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

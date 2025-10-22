"""
Dashboard API Endpoints
Provides student dashboard overview and statistics
"""
from fastapi import APIRouter, Depends, HTTPException, status
from sqlalchemy.orm import Session
from sqlalchemy import and_, func, or_, desc
from typing import List
import os
import sys
from datetime import datetime
import time

# Add parent directory to path
sys.path.append(os.path.dirname(os.path.dirname(os.path.abspath(__file__))))

from core.database import get_erp_db, get_moodle_db
from models.moodle_models import (
    Course,
    Enrol,
    UserEnrolment,
    Assignment,
    Quiz,
    AssignSubmission,
    AssignGrades,
    QuizAttempt,
    Badge,
    BadgeIssued,
    CourseModule,
    CourseModulesCompletion
)
from models.erp_models import UserMapping
from schemas.dashboard import (
    StudentDashboard,
    DashboardStats,
    UpcomingDeadline,
    RecentActivity,
    CourseOverview
)
from api.auth import get_current_user

router = APIRouter()


def get_moodle_user_id(erp_user_id: str, erp_db: Session) -> int:
    """Helper to get Moodle user ID from ERP user ID"""
    mapping = erp_db.query(UserMapping).filter(UserMapping.erp_user_id == erp_user_id).first()
    if not mapping:
        raise HTTPException(
            status_code=status.HTTP_404_NOT_FOUND,
            detail="User mapping not found"
        )
    return mapping.moodle_user_id


@router.get("/", response_model=StudentDashboard)
async def get_student_dashboard(
    current_user: dict = Depends(get_current_user),
    moodle_db: Session = Depends(get_moodle_db),
    erp_db: Session = Depends(get_erp_db)
):
    """
    Get complete student dashboard with stats, deadlines, and activities
    """
    # Get Moodle user ID
    user_id = current_user.get("id")
    moodle_user_id = get_moodle_user_id(user_id, erp_db)

    # Get enrolled courses
    enrolled_courses = moodle_db.query(Course, UserEnrolment).join(
        Enrol, Course.id == Enrol.courseid
    ).join(
        UserEnrolment, and_(
            UserEnrolment.enrolid == Enrol.id,
            UserEnrolment.userid == moodle_user_id,
            UserEnrolment.status == 0
        )
    ).filter(Course.visible == 1).all()

    # Calculate stats
    enrolled_count = len(enrolled_courses)
    completed_count = 0
    in_progress_count = 0

    course_ids = []
    course_overviews = []

    for course, enrollment in enrolled_courses:
        course_ids.append(course.id)

        # Calculate course progress
        total_modules = moodle_db.query(func.count(CourseModule.id)).filter(
            and_(
                CourseModule.course == course.id,
                CourseModule.visible == 1,
                CourseModule.deletioninprogress == 0
            )
        ).scalar() or 0

        completed_modules = 0
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

        # Count as completed if 100% or if course has ended
        if progress >= 100:
            completed_count += 1
        elif progress > 0:
            in_progress_count += 1

        # Count pending items (assignments + quizzes not submitted)
        pending_assignments = moodle_db.query(func.count(Assignment.id)).outerjoin(
            AssignSubmission, and_(
                AssignSubmission.assignment == Assignment.id,
                AssignSubmission.userid == moodle_user_id,
                AssignSubmission.latest == 1,
                AssignSubmission.status == "submitted"
            )
        ).filter(
            and_(
                Assignment.course == course.id,
                AssignSubmission.id.is_(None)  # No submission
            )
        ).scalar() or 0

        pending_quizzes = moodle_db.query(func.count(Quiz.id)).outerjoin(
            QuizAttempt, and_(
                QuizAttempt.quiz == Quiz.id,
                QuizAttempt.userid == moodle_user_id,
                QuizAttempt.state == "finished"
            )
        ).filter(
            and_(
                Quiz.course == course.id,
                QuizAttempt.id.is_(None)  # No attempt
            )
        ).scalar() or 0

        pending_items = pending_assignments + pending_quizzes

        course_overviews.append(
            CourseOverview(
                id=course.id,
                name=course.fullname,
                progress=round(progress, 2),
                grade=None,  # TODO: Calculate from grade items
                last_accessed=None,  # TODO: Get from mdl_user_lastaccess
                pending_items=pending_items
            )
        )

    # Count pending and overdue assignments across all courses
    current_time = int(time.time())

    pending_assignments_query = moodle_db.query(Assignment).outerjoin(
        AssignSubmission, and_(
            AssignSubmission.assignment == Assignment.id,
            AssignSubmission.userid == moodle_user_id,
            AssignSubmission.latest == 1,
            AssignSubmission.status == "submitted"
        )
    ).filter(
        and_(
            Assignment.course.in_(course_ids) if course_ids else False,
            AssignSubmission.id.is_(None)
        )
    )

    pending_assignments_count = pending_assignments_query.count()

    overdue_assignments_count = pending_assignments_query.filter(
        and_(
            Assignment.duedate > 0,
            Assignment.duedate < current_time
        )
    ).count()

    # Count upcoming quizzes
    upcoming_quizzes_count = moodle_db.query(func.count(Quiz.id)).outerjoin(
        QuizAttempt, and_(
            QuizAttempt.quiz == Quiz.id,
            QuizAttempt.userid == moodle_user_id,
            QuizAttempt.state == "finished"
        )
    ).filter(
        and_(
            Quiz.course.in_(course_ids) if course_ids else False,
            QuizAttempt.id.is_(None),
            or_(
                Quiz.timeclose == 0,
                Quiz.timeclose > current_time
            )
        )
    ).scalar() or 0

    # Count earned badges
    earned_badges_count = moodle_db.query(func.count(BadgeIssued.id)).filter(
        BadgeIssued.userid == moodle_user_id
    ).scalar() or 0

    # Build stats
    stats = DashboardStats(
        enrolled_courses=enrolled_count,
        completed_courses=completed_count,
        in_progress_courses=in_progress_count,
        pending_assignments=pending_assignments_count,
        overdue_assignments=overdue_assignments_count,
        upcoming_quizzes=upcoming_quizzes_count,
        earned_badges=earned_badges_count,
        total_grade_points=0.0  # TODO: Calculate from grades
    )

    # Get upcoming deadlines (next 10)
    upcoming_deadlines = []

    # Get assignment deadlines
    upcoming_assignments = moodle_db.query(Assignment, Course).join(
        Course, Assignment.course == Course.id
    ).outerjoin(
        AssignSubmission, and_(
            AssignSubmission.assignment == Assignment.id,
            AssignSubmission.userid == moodle_user_id,
            AssignSubmission.latest == 1
        )
    ).outerjoin(
        AssignGrades, and_(
            AssignGrades.assignment == Assignment.id,
            AssignGrades.userid == moodle_user_id
        )
    ).filter(
        and_(
            Assignment.course.in_(course_ids) if course_ids else False,
            Assignment.duedate > 0
        )
    ).order_by(Assignment.duedate).limit(10).all()

    for assignment, course in upcoming_assignments:
        # Determine status
        submission = moodle_db.query(AssignSubmission).filter(
            and_(
                AssignSubmission.assignment == assignment.id,
                AssignSubmission.userid == moodle_user_id,
                AssignSubmission.latest == 1
            )
        ).first()

        grade = moodle_db.query(AssignGrades).filter(
            and_(
                AssignGrades.assignment == assignment.id,
                AssignGrades.userid == moodle_user_id
            )
        ).first()

        if grade and grade.grade >= 0:
            status = "graded"
        elif submission and submission.status == "submitted":
            status = "submitted"
        else:
            status = "pending"

        upcoming_deadlines.append(
            UpcomingDeadline(
                id=assignment.id,
                type="assignment",
                title=assignment.name,
                course_name=course.fullname,
                due_date=datetime.fromtimestamp(assignment.duedate),
                is_overdue=assignment.duedate < current_time,
                status=status
            )
        )

    # Get quiz deadlines
    upcoming_quizzes = moodle_db.query(Quiz, Course).join(
        Course, Quiz.course == Course.id
    ).filter(
        and_(
            Quiz.course.in_(course_ids) if course_ids else False,
            Quiz.timeclose > 0,
            Quiz.timeclose > current_time
        )
    ).order_by(Quiz.timeclose).limit(10).all()

    for quiz, course in upcoming_quizzes:
        # Check if completed
        attempt = moodle_db.query(QuizAttempt).filter(
            and_(
                QuizAttempt.quiz == quiz.id,
                QuizAttempt.userid == moodle_user_id,
                QuizAttempt.state == "finished"
            )
        ).first()

        status = "graded" if attempt else "pending"

        upcoming_deadlines.append(
            UpcomingDeadline(
                id=quiz.id,
                type="quiz",
                title=quiz.name,
                course_name=course.fullname,
                due_date=datetime.fromtimestamp(quiz.timeclose),
                is_overdue=False,
                status=status
            )
        )

    # Sort deadlines by due date
    upcoming_deadlines.sort(key=lambda x: x.due_date)
    upcoming_deadlines = upcoming_deadlines[:10]

    # Get recent activities (last 10)
    recent_activities = []

    # Recent enrollments
    recent_enrollments = moodle_db.query(UserEnrolment, Course).join(
        Enrol, UserEnrolment.enrolid == Enrol.id
    ).join(
        Course, Enrol.courseid == Course.id
    ).filter(
        UserEnrolment.userid == moodle_user_id
    ).order_by(desc(UserEnrolment.timecreated)).limit(5).all()

    for enrollment, course in recent_enrollments:
        recent_activities.append(
            RecentActivity(
                id=enrollment.id,
                type="enrollment",
                title=f"Enrolled in {course.fullname}",
                description=course.summary[:100] if course.summary else None,
                timestamp=datetime.fromtimestamp(enrollment.timecreated)
            )
        )

    # Recent assignment submissions
    recent_submissions = moodle_db.query(AssignSubmission, Assignment, Course).join(
        Assignment, AssignSubmission.assignment == Assignment.id
    ).join(
        Course, Assignment.course == Course.id
    ).filter(
        AssignSubmission.userid == moodle_user_id
    ).order_by(desc(AssignSubmission.timecreated)).limit(5).all()

    for submission, assignment, course in recent_submissions:
        recent_activities.append(
            RecentActivity(
                id=submission.id,
                type="submission",
                title=f"Submitted {assignment.name}",
                description=f"In {course.fullname}",
                timestamp=datetime.fromtimestamp(submission.timecreated)
            )
        )

    # Recent badges
    recent_badges = moodle_db.query(BadgeIssued, Badge).join(
        Badge, BadgeIssued.badgeid == Badge.id
    ).filter(
        BadgeIssued.userid == moodle_user_id
    ).order_by(desc(BadgeIssued.dateissued)).limit(5).all()

    for badge_issued, badge in recent_badges:
        recent_activities.append(
            RecentActivity(
                id=badge_issued.id,
                type="badge",
                title=f"Earned badge: {badge.name}",
                description=badge.description[:100] if badge.description else None,
                timestamp=datetime.fromtimestamp(badge_issued.dateissued)
            )
        )

    # Sort activities by timestamp
    recent_activities.sort(key=lambda x: x.timestamp, reverse=True)
    recent_activities = recent_activities[:10]

    return StudentDashboard(
        stats=stats,
        upcoming_deadlines=upcoming_deadlines,
        recent_activities=recent_activities,
        courses=course_overviews
    )


@router.get("/stats", response_model=DashboardStats)
async def get_dashboard_stats(
    current_user: dict = Depends(get_current_user),
    moodle_db: Session = Depends(get_moodle_db),
    erp_db: Session = Depends(get_erp_db)
):
    """
    Get dashboard statistics only (lighter endpoint)
    """
    dashboard = await get_student_dashboard(current_user, moodle_db, erp_db)
    return dashboard.stats

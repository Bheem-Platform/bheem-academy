"""
Assignment API Endpoints
Handles assignment submissions and grading
"""
from fastapi import APIRouter, Depends, HTTPException, status, Query
from sqlalchemy.orm import Session
from sqlalchemy import and_, desc
from typing import List, Optional
import os
import sys
from datetime import datetime
import time

# Add parent directory to path
sys.path.append(os.path.dirname(os.path.dirname(os.path.abspath(__file__))))

from core.database import get_erp_db, get_moodle_db
from models.moodle_models import (
    Assignment as MoodleAssignment,
    AssignSubmission,
    AssignGrades,
    Course,
    UserEnrolment,
    Enrol
)
from models.erp_models import UserMapping
from schemas.assignment import (
    Assignment,
    AssignmentSubmitRequest,
    AssignmentSubmission,
    AssignmentGradeRequest,
    AssignmentListResponse,
    MyAssignment
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


@router.get("/course/{course_id}", response_model=AssignmentListResponse)
async def get_course_assignments(
    course_id: int,
    current_user: dict = Depends(get_current_user),
    moodle_db: Session = Depends(get_moodle_db),
    erp_db: Session = Depends(get_erp_db)
):
    """
    Get all assignments for a course
    """
    # Get Moodle user ID
    user_id = current_user.get("id")
    moodle_user_id = get_moodle_user_id(user_id, erp_db)

    # Check if user is enrolled in course
    enrol = moodle_db.query(Enrol).filter(
        and_(Enrol.courseid == course_id, Enrol.status == 0)
    ).first()

    if not enrol:
        raise HTTPException(
            status_code=status.HTTP_404_NOT_FOUND,
            detail="Course not found or not available"
        )

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

    # Get course name
    course = moodle_db.query(Course).filter(Course.id == course_id).first()
    course_name = course.fullname if course else "Unknown"

    # Get assignments
    assignments = moodle_db.query(MoodleAssignment).filter(
        MoodleAssignment.course == course_id
    ).order_by(desc(MoodleAssignment.duedate)).all()

    result = []
    for assign in assignments:
        # Check submission status
        submission = moodle_db.query(AssignSubmission).filter(
            and_(
                AssignSubmission.assignment == assign.id,
                AssignSubmission.userid == moodle_user_id,
                AssignSubmission.latest == 1
            )
        ).first()

        has_submitted = bool(submission and submission.status == "submitted")
        submission_status = submission.status if submission else "new"

        # Check grade
        grade_record = moodle_db.query(AssignGrades).filter(
            and_(
                AssignGrades.assignment == assign.id,
                AssignGrades.userid == moodle_user_id
            )
        ).first()

        grading_status = "graded" if grade_record and grade_record.grade >= 0 else "notgraded"
        user_grade = grade_record.grade if grade_record else None

        result.append(
            Assignment(
                id=assign.id,
                course_id=assign.course,
                course_name=course_name,
                name=assign.name,
                intro=assign.intro,
                due_date=datetime.fromtimestamp(assign.duedate) if assign.duedate > 0 else None,
                allow_submissions_from_date=datetime.fromtimestamp(assign.allowsubmissionsfromdate) if assign.allowsubmissionsfromdate > 0 else None,
                grade=assign.grade,
                max_attempts=assign.maxattempts,
                time_modified=datetime.fromtimestamp(assign.timemodified),
                has_submitted=has_submitted,
                submission_status=submission_status,
                grading_status=grading_status,
                user_grade=user_grade
            )
        )

    return AssignmentListResponse(
        assignments=result,
        total=len(result)
    )


@router.get("/{assignment_id}", response_model=Assignment)
async def get_assignment(
    assignment_id: int,
    current_user: dict = Depends(get_current_user),
    moodle_db: Session = Depends(get_moodle_db),
    erp_db: Session = Depends(get_erp_db)
):
    """
    Get assignment details
    """
    # Get Moodle user ID
    user_id = current_user.get("id")
    moodle_user_id = get_moodle_user_id(user_id, erp_db)

    # Get assignment
    assign = moodle_db.query(MoodleAssignment).filter(MoodleAssignment.id == assignment_id).first()
    if not assign:
        raise HTTPException(
            status_code=status.HTTP_404_NOT_FOUND,
            detail="Assignment not found"
        )

    # Get course name
    course = moodle_db.query(Course).filter(Course.id == assign.course).first()
    course_name = course.fullname if course else "Unknown"

    # Check submission status
    submission = moodle_db.query(AssignSubmission).filter(
        and_(
            AssignSubmission.assignment == assignment_id,
            AssignSubmission.userid == moodle_user_id,
            AssignSubmission.latest == 1
        )
    ).first()

    has_submitted = bool(submission and submission.status == "submitted")
    submission_status = submission.status if submission else "new"

    # Check grade
    grade_record = moodle_db.query(AssignGrades).filter(
        and_(
            AssignGrades.assignment == assignment_id,
            AssignGrades.userid == moodle_user_id
        )
    ).first()

    grading_status = "graded" if grade_record and grade_record.grade >= 0 else "notgraded"
    user_grade = grade_record.grade if grade_record else None

    return Assignment(
        id=assign.id,
        course_id=assign.course,
        course_name=course_name,
        name=assign.name,
        intro=assign.intro,
        due_date=datetime.fromtimestamp(assign.duedate) if assign.duedate > 0 else None,
        allow_submissions_from_date=datetime.fromtimestamp(assign.allowsubmissionsfromdate) if assign.allowsubmissionsfromdate > 0 else None,
        grade=assign.grade,
        max_attempts=assign.maxattempts,
        time_modified=datetime.fromtimestamp(assign.timemodified),
        has_submitted=has_submitted,
        submission_status=submission_status,
        grading_status=grading_status,
        user_grade=user_grade
    )


@router.post("/submit", response_model=AssignmentSubmission, status_code=status.HTTP_201_CREATED)
async def submit_assignment(
    request: AssignmentSubmitRequest,
    current_user: dict = Depends(get_current_user),
    moodle_db: Session = Depends(get_moodle_db),
    erp_db: Session = Depends(get_erp_db)
):
    """
    Submit assignment (online text or file)
    """
    # Get Moodle user ID
    user_id = current_user.get("id")
    moodle_user_id = get_moodle_user_id(user_id, erp_db)

    assignment_id = request.assignment_id

    # Get assignment
    assign = moodle_db.query(MoodleAssignment).filter(MoodleAssignment.id == assignment_id).first()
    if not assign:
        raise HTTPException(
            status_code=status.HTTP_404_NOT_FOUND,
            detail="Assignment not found"
        )

    # Check if submissions are allowed
    current_time = int(time.time())
    if assign.allowsubmissionsfromdate > 0 and current_time < assign.allowsubmissionsfromdate:
        raise HTTPException(
            status_code=status.HTTP_400_BAD_REQUEST,
            detail="Submissions are not yet allowed for this assignment"
        )

    # Check if assignment is overdue (allow late submissions with warning)
    is_late = assign.duedate > 0 and current_time > assign.duedate

    # Get existing submission
    existing = moodle_db.query(AssignSubmission).filter(
        and_(
            AssignSubmission.assignment == assignment_id,
            AssignSubmission.userid == moodle_user_id,
            AssignSubmission.latest == 1
        )
    ).first()

    # Calculate attempt number
    attempt_number = 1
    if existing:
        attempt_number = existing.attemptnumber + 1

        # Check max attempts
        if assign.maxattempts > 0 and attempt_number > assign.maxattempts:
            raise HTTPException(
                status_code=status.HTTP_400_BAD_REQUEST,
                detail=f"Maximum attempts ({assign.maxattempts}) reached"
            )

        # Mark existing as not latest
        existing.latest = 0
        moodle_db.commit()

    # Create new submission
    new_submission = AssignSubmission(
        assignment=assignment_id,
        userid=moodle_user_id,
        timecreated=current_time,
        timemodified=current_time,
        status="submitted",
        groupid=0,
        attemptnumber=attempt_number,
        latest=1
    )

    # Add online text if provided
    if request.online_text:
        new_submission.onlinetext = request.online_text
        new_submission.onlineformat = 1  # HTML

    moodle_db.add(new_submission)
    moodle_db.commit()
    moodle_db.refresh(new_submission)

    return AssignmentSubmission(
        id=new_submission.id,
        assignment_id=new_submission.assignment,
        user_id=new_submission.userid,
        attempt_number=new_submission.attemptnumber,
        status=new_submission.status,
        time_created=datetime.fromtimestamp(new_submission.timecreated),
        time_modified=datetime.fromtimestamp(new_submission.timemodified),
        online_text=new_submission.onlinetext
    )


@router.get("/{assignment_id}/submissions")
async def get_assignment_submissions(
    assignment_id: int,
    current_user: dict = Depends(get_current_user),
    moodle_db: Session = Depends(get_moodle_db),
    erp_db: Session = Depends(get_erp_db)
):
    """
    Get user's submissions for an assignment
    """
    # Get Moodle user ID
    user_id = current_user.get("id")
    moodle_user_id = get_moodle_user_id(user_id, erp_db)

    # Get all submissions
    submissions = moodle_db.query(AssignSubmission).filter(
        and_(
            AssignSubmission.assignment == assignment_id,
            AssignSubmission.userid == moodle_user_id
        )
    ).order_by(desc(AssignSubmission.attemptnumber)).all()

    result = []
    for sub in submissions:
        # Get grade for this submission
        grade_record = moodle_db.query(AssignGrades).filter(
            and_(
                AssignGrades.assignment == assignment_id,
                AssignGrades.userid == moodle_user_id,
                AssignGrades.attemptnumber == sub.attemptnumber
            )
        ).first()

        result.append(
            AssignmentSubmission(
                id=sub.id,
                assignment_id=sub.assignment,
                user_id=sub.userid,
                attempt_number=sub.attemptnumber,
                status=sub.status,
                time_created=datetime.fromtimestamp(sub.timecreated),
                time_modified=datetime.fromtimestamp(sub.timemodified),
                online_text=sub.onlinetext,
                grade=grade_record.grade if grade_record else None,
                grader_feedback=grade_record.feedback if grade_record else None,
                graded_date=datetime.fromtimestamp(grade_record.timemodified) if grade_record else None
            )
        )

    return result


@router.get("/my-assignments", response_model=List[MyAssignment])
async def get_my_assignments(
    current_user: dict = Depends(get_current_user),
    moodle_db: Session = Depends(get_moodle_db),
    erp_db: Session = Depends(get_erp_db)
):
    """
    Get all assignments for user's enrolled courses
    """
    # Get Moodle user ID
    user_id = current_user.get("id")
    moodle_user_id = get_moodle_user_id(user_id, erp_db)

    # Get enrolled courses
    enrolled_courses = moodle_db.query(Course.id, Course.fullname).join(
        Enrol, Course.id == Enrol.courseid
    ).join(
        UserEnrolment, and_(
            UserEnrolment.enrolid == Enrol.id,
            UserEnrolment.userid == moodle_user_id,
            UserEnrolment.status == 0
        )
    ).all()

    course_map = {course_id: course_name for course_id, course_name in enrolled_courses}

    if not course_map:
        return []

    # Get assignments from enrolled courses
    assignments = moodle_db.query(MoodleAssignment).filter(
        MoodleAssignment.course.in_(course_map.keys())
    ).order_by(MoodleAssignment.duedate).all()

    current_time = int(time.time())
    result = []

    for assign in assignments:
        # Check submission status
        submission = moodle_db.query(AssignSubmission).filter(
            and_(
                AssignSubmission.assignment == assign.id,
                AssignSubmission.userid == moodle_user_id,
                AssignSubmission.latest == 1
            )
        ).first()

        has_submitted = bool(submission and submission.status == "submitted")
        submission_status = submission.status if submission else "new"

        # Check grade
        grade_record = moodle_db.query(AssignGrades).filter(
            and_(
                AssignGrades.assignment == assign.id,
                AssignGrades.userid == moodle_user_id
            )
        ).first()

        grading_status = "graded" if grade_record and grade_record.grade >= 0 else "notgraded"
        user_grade = grade_record.grade if grade_record else None

        # Check if overdue
        is_overdue = assign.duedate > 0 and current_time > assign.duedate and not has_submitted

        result.append(
            MyAssignment(
                id=assign.id,
                name=assign.name,
                course_name=course_map.get(assign.course, "Unknown"),
                due_date=datetime.fromtimestamp(assign.duedate) if assign.duedate > 0 else None,
                has_submitted=has_submitted,
                submission_status=submission_status,
                grade=user_grade,
                grading_status=grading_status,
                is_overdue=is_overdue
            )
        )

    return result

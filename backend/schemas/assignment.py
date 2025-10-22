"""
Assignment Schemas
Pydantic models for assignment submissions and grading
"""
from pydantic import BaseModel, Field
from typing import Optional, List
from datetime import datetime


class Assignment(BaseModel):
    """Assignment details"""
    id: int
    course_id: int
    course_name: Optional[str] = None
    name: str
    intro: Optional[str] = None
    due_date: Optional[datetime] = None
    allow_submissions_from_date: Optional[datetime] = None
    grade: int = 100
    submission_type: str = "file"  # file, online, both
    max_attempts: int = -1  # -1 = unlimited
    time_modified: Optional[datetime] = None

    # Submission status
    has_submitted: bool = False
    submission_status: Optional[str] = None  # submitted, draft, new
    grading_status: Optional[str] = None  # graded, notgraded
    user_grade: Optional[float] = None

    class Config:
        from_attributes = True


class AssignmentSubmitRequest(BaseModel):
    """Submit assignment request"""
    assignment_id: int = Field(..., gt=0)
    online_text: Optional[str] = Field(None, description="Online text submission")
    file_url: Optional[str] = Field(None, description="File URL or path")


class AssignmentSubmission(BaseModel):
    """Assignment submission details"""
    id: int
    assignment_id: int
    user_id: int
    attempt_number: int
    status: str  # draft, submitted
    time_created: datetime
    time_modified: datetime
    online_text: Optional[str] = None
    grade: Optional[float] = None
    grader_feedback: Optional[str] = None
    graded_date: Optional[datetime] = None

    class Config:
        from_attributes = True


class AssignmentGradeRequest(BaseModel):
    """Grade assignment request (teacher only)"""
    submission_id: int = Field(..., gt=0)
    grade: float = Field(..., ge=0, le=100)
    feedback: Optional[str] = None


class AssignmentListResponse(BaseModel):
    """List of assignments"""
    assignments: List[Assignment]
    total: int


class MyAssignment(BaseModel):
    """User's assignment with submission info"""
    id: int
    name: str
    course_name: str
    due_date: Optional[datetime] = None
    has_submitted: bool
    submission_status: Optional[str] = None
    grade: Optional[float] = None
    grading_status: Optional[str] = None
    is_overdue: bool = False

    class Config:
        from_attributes = True

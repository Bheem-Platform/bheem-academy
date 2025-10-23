"""
Course Schemas
Pydantic models for course-related operations
"""
from pydantic import BaseModel, Field
from typing import Optional, List
from datetime import datetime


class CourseCategory(BaseModel):
    """Course category"""
    id: int
    name: str
    description: Optional[str] = None
    parent: Optional[int] = None
    coursecount: int = 0

    class Config:
        from_attributes = True


class CourseBasic(BaseModel):
    """Basic course information"""
    id: int
    fullname: str
    shortname: str
    category: int
    summary: Optional[str] = None
    visible: bool = True
    format: str = "topics"

    class Config:
        from_attributes = True


class CourseDetail(BaseModel):
    """Detailed course information"""
    id: int
    category: int
    category_name: Optional[str] = None
    fullname: str
    shortname: str
    summary: Optional[str] = None
    summary_format: int = 1
    format: str = "topics"
    startdate: int
    enddate: int
    visible: bool
    enablecompletion: bool = False
    lang: Optional[str] = None
    timecreated: int
    timemodified: int

    # Enrollment info
    is_enrolled: bool = False
    enrollment_status: Optional[str] = None

    # Progress info
    completion_percentage: float = 0.0

    class Config:
        from_attributes = True


class EnrollmentRequest(BaseModel):
    """Course enrollment request"""
    course_id: int = Field(..., gt=0)


class EnrollmentResponse(BaseModel):
    """Enrollment response"""
    success: bool
    message: str
    course_id: int
    user_id: int
    enrollment_id: Optional[int] = None


class CourseProgress(BaseModel):
    """Course progress information"""
    course_id: int
    course_name: str
    enrolled_date: Optional[datetime] = None
    completion_percentage: float = 0.0
    total_activities: int = 0
    completed_activities: int = 0
    last_access: Optional[datetime] = None
    grade: Optional[float] = None

    class Config:
        from_attributes = True


class MyCourse(BaseModel):
    """User's enrolled course"""
    id: int
    fullname: str
    shortname: str
    summary: Optional[str] = None
    category_name: Optional[str] = None
    enrollment_date: Optional[datetime] = None
    last_access: Optional[datetime] = None
    progress: float = 0.0
    visible: bool = True

    class Config:
        from_attributes = True


class CourseSearchFilter(BaseModel):
    """Course search and filter parameters"""
    search: Optional[str] = Field(None, description="Search in course name and description")
    category_id: Optional[int] = Field(None, description="Filter by category")
    visible_only: bool = Field(True, description="Show only visible courses")
    page: int = Field(1, ge=1)
    page_size: int = Field(20, ge=1, le=100)


class CourseListResponse(BaseModel):
    """Paginated course list response"""
    courses: List[CourseBasic]
    total: int
    page: int
    page_size: int
    total_pages: int


class UnenrollRequest(BaseModel):
    """Course unenrollment request"""
    course_id: int = Field(..., gt=0)


class CourseModuleCompletion(BaseModel):
    """Module completion status"""
    module_id: int
    module_name: str
    module_type: str
    completed: bool
    completion_date: Optional[datetime] = None

    class Config:
        from_attributes = True

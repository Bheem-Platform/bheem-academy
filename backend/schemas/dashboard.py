"""
Dashboard Schemas
Pydantic models for student dashboard
"""
from pydantic import BaseModel
from typing import List, Optional
from datetime import datetime


class DashboardStats(BaseModel):
    """Overall dashboard statistics"""
    enrolled_courses: int = 0
    completed_courses: int = 0
    in_progress_courses: int = 0
    pending_assignments: int = 0
    overdue_assignments: int = 0
    upcoming_quizzes: int = 0
    earned_badges: int = 0
    total_grade_points: float = 0.0


class UpcomingDeadline(BaseModel):
    """Upcoming assignment/quiz deadline"""
    id: int
    type: str  # assignment, quiz
    title: str
    course_name: str
    due_date: datetime
    is_overdue: bool = False
    status: str  # submitted, pending, graded


class RecentActivity(BaseModel):
    """Recent course activity"""
    id: int
    type: str  # enrollment, submission, grade, badge
    title: str
    description: Optional[str] = None
    timestamp: datetime


class CourseOverview(BaseModel):
    """Course overview for dashboard"""
    id: int
    name: str
    progress: float
    grade: Optional[float] = None
    last_accessed: Optional[datetime] = None
    pending_items: int = 0


class StudentDashboard(BaseModel):
    """Complete student dashboard"""
    stats: DashboardStats
    upcoming_deadlines: List[UpcomingDeadline]
    recent_activities: List[RecentActivity]
    courses: List[CourseOverview]

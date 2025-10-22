"""
Badge Schemas
Pydantic models for badges and achievements
"""
from pydantic import BaseModel
from typing import List, Optional
from datetime import datetime


class Badge(BaseModel):
    """Badge details"""
    id: int
    name: str
    description: Optional[str] = None
    image_url: Optional[str] = None
    issuer_name: Optional[str] = None
    course_id: Optional[int] = None
    course_name: Optional[str] = None
    type: int = 2  # 1=site, 2=course
    status: int = 1  # 0=inactive, 1=active
    time_created: datetime

    class Config:
        from_attributes = True


class BadgeIssued(BaseModel):
    """Issued badge with earning details"""
    badge_id: int
    badge_name: str
    badge_description: Optional[str] = None
    image_url: Optional[str] = None
    date_issued: datetime
    date_expire: Optional[datetime] = None
    unique_hash: str
    course_name: Optional[str] = None

    class Config:
        from_attributes = True


class BadgeGalleryResponse(BaseModel):
    """Badge gallery with available and earned badges"""
    available_badges: List[Badge]
    earned_badges: List[BadgeIssued]
    total_available: int
    total_earned: int


class BadgeVerification(BaseModel):
    """Badge verification response"""
    valid: bool
    badge_id: Optional[int] = None
    badge_name: Optional[str] = None
    user_id: Optional[int] = None
    date_issued: Optional[datetime] = None
    message: str

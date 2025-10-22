"""
Badge API Endpoints
Handles badges and achievements
"""
from fastapi import APIRouter, Depends, HTTPException, status, Query
from sqlalchemy.orm import Session
from sqlalchemy import and_, or_
from typing import List
import os
import sys
from datetime import datetime

# Add parent directory to path
sys.path.append(os.path.dirname(os.path.dirname(os.path.abspath(__file__))))

from core.database import get_erp_db, get_moodle_db
from models.moodle_models import (
    Badge as MoodleBadge,
    BadgeIssued as MoodleBadgeIssued,
    Course
)
from models.erp_models import UserMapping
from schemas.badge import (
    Badge,
    BadgeIssued,
    BadgeGalleryResponse,
    BadgeVerification
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


@router.get("/gallery", response_model=BadgeGalleryResponse)
async def get_badge_gallery(
    current_user: dict = Depends(get_current_user),
    moodle_db: Session = Depends(get_moodle_db),
    erp_db: Session = Depends(get_erp_db)
):
    """
    Get badge gallery showing all available badges and user's earned badges
    """
    # Get Moodle user ID
    user_id = current_user.get("id")
    moodle_user_id = get_moodle_user_id(user_id, erp_db)

    # Get all active badges (site-wide and course badges)
    available_badges_query = moodle_db.query(MoodleBadge, Course).outerjoin(
        Course, MoodleBadge.courseid == Course.id
    ).filter(
        and_(
            MoodleBadge.status == 1,  # Active
            or_(
                MoodleBadge.type == 1,  # Site badge
                MoodleBadge.type == 2   # Course badge
            )
        )
    ).all()

    available_badges = []
    for badge, course in available_badges_query:
        available_badges.append(
            Badge(
                id=badge.id,
                name=badge.name,
                description=badge.description,
                image_url=None,  # TODO: Build image URL from badge.id
                issuer_name=badge.issuername,
                course_id=badge.courseid if badge.courseid else None,
                course_name=course.fullname if course else None,
                type=badge.type,
                status=badge.status,
                time_created=datetime.fromtimestamp(badge.timecreated)
            )
        )

    # Get user's earned badges
    earned_badges_query = moodle_db.query(MoodleBadgeIssued, MoodleBadge, Course).join(
        MoodleBadge, MoodleBadgeIssued.badgeid == MoodleBadge.id
    ).outerjoin(
        Course, MoodleBadge.courseid == Course.id
    ).filter(
        MoodleBadgeIssued.userid == moodle_user_id
    ).all()

    earned_badges = []
    for badge_issued, badge, course in earned_badges_query:
        earned_badges.append(
            BadgeIssued(
                badge_id=badge.id,
                badge_name=badge.name,
                badge_description=badge.description,
                image_url=None,  # TODO: Build image URL
                date_issued=datetime.fromtimestamp(badge_issued.dateissued),
                date_expire=datetime.fromtimestamp(badge_issued.dateexpire) if badge_issued.dateexpire > 0 else None,
                unique_hash=badge_issued.uniquehash,
                course_name=course.fullname if course else None
            )
        )

    return BadgeGalleryResponse(
        available_badges=available_badges,
        earned_badges=earned_badges,
        total_available=len(available_badges),
        total_earned=len(earned_badges)
    )


@router.get("/my-badges", response_model=List[BadgeIssued])
async def get_my_badges(
    current_user: dict = Depends(get_current_user),
    moodle_db: Session = Depends(get_moodle_db),
    erp_db: Session = Depends(get_erp_db)
):
    """
    Get current user's earned badges
    """
    # Get Moodle user ID
    user_id = current_user.get("id")
    moodle_user_id = get_moodle_user_id(user_id, erp_db)

    # Get earned badges
    earned_badges_query = moodle_db.query(MoodleBadgeIssued, MoodleBadge, Course).join(
        MoodleBadge, MoodleBadgeIssued.badgeid == MoodleBadge.id
    ).outerjoin(
        Course, MoodleBadge.courseid == Course.id
    ).filter(
        MoodleBadgeIssued.userid == moodle_user_id
    ).order_by(MoodleBadgeIssued.dateissued.desc()).all()

    earned_badges = []
    for badge_issued, badge, course in earned_badges_query:
        earned_badges.append(
            BadgeIssued(
                badge_id=badge.id,
                badge_name=badge.name,
                badge_description=badge.description,
                image_url=None,
                date_issued=datetime.fromtimestamp(badge_issued.dateissued),
                date_expire=datetime.fromtimestamp(badge_issued.dateexpire) if badge_issued.dateexpire > 0 else None,
                unique_hash=badge_issued.uniquehash,
                course_name=course.fullname if course else None
            )
        )

    return earned_badges


@router.get("/verify/{unique_hash}", response_model=BadgeVerification)
async def verify_badge(
    unique_hash: str,
    moodle_db: Session = Depends(get_moodle_db)
):
    """
    Verify a badge by its unique hash
    """
    # Look up badge by unique hash
    badge_issued = moodle_db.query(MoodleBadgeIssued, MoodleBadge).join(
        MoodleBadge, MoodleBadgeIssued.badgeid == MoodleBadge.id
    ).filter(
        MoodleBadgeIssued.uniquehash == unique_hash
    ).first()

    if not badge_issued:
        return BadgeVerification(
            valid=False,
            message="Badge not found or invalid hash"
        )

    badge_issued_record, badge = badge_issued

    # Check if badge is expired
    if badge_issued_record.dateexpire > 0:
        current_time = int(datetime.now().timestamp())
        if current_time > badge_issued_record.dateexpire:
            return BadgeVerification(
                valid=False,
                badge_id=badge.id,
                badge_name=badge.name,
                user_id=badge_issued_record.userid,
                date_issued=datetime.fromtimestamp(badge_issued_record.dateissued),
                message="Badge has expired"
            )

    return BadgeVerification(
        valid=True,
        badge_id=badge.id,
        badge_name=badge.name,
        user_id=badge_issued_record.userid,
        date_issued=datetime.fromtimestamp(badge_issued_record.dateissued),
        message="Badge is valid and verified"
    )


@router.get("/available", response_model=List[Badge])
async def get_available_badges(
    course_id: int = Query(None, description="Filter by course ID"),
    moodle_db: Session = Depends(get_moodle_db)
):
    """
    Get all available badges (optionally filtered by course)
    """
    query = moodle_db.query(MoodleBadge, Course).outerjoin(
        Course, MoodleBadge.courseid == Course.id
    ).filter(MoodleBadge.status == 1)

    if course_id:
        query = query.filter(MoodleBadge.courseid == course_id)

    badges_query = query.all()

    badges = []
    for badge, course in badges_query:
        badges.append(
            Badge(
                id=badge.id,
                name=badge.name,
                description=badge.description,
                image_url=None,
                issuer_name=badge.issuername,
                course_id=badge.courseid if badge.courseid else None,
                course_name=course.fullname if course else None,
                type=badge.type,
                status=badge.status,
                time_created=datetime.fromtimestamp(badge.timecreated)
            )
        )

    return badges


@router.get("/{badge_id}", response_model=Badge)
async def get_badge_details(
    badge_id: int,
    moodle_db: Session = Depends(get_moodle_db)
):
    """
    Get detailed information about a specific badge
    """
    badge_query = moodle_db.query(MoodleBadge, Course).outerjoin(
        Course, MoodleBadge.courseid == Course.id
    ).filter(MoodleBadge.id == badge_id).first()

    if not badge_query:
        raise HTTPException(
            status_code=status.HTTP_404_NOT_FOUND,
            detail="Badge not found"
        )

    badge, course = badge_query

    return Badge(
        id=badge.id,
        name=badge.name,
        description=badge.description,
        image_url=None,
        issuer_name=badge.issuername,
        course_id=badge.courseid if badge.courseid else None,
        course_name=course.fullname if course else None,
        type=badge.type,
        status=badge.status,
        time_created=datetime.fromtimestamp(badge.timecreated)
    )

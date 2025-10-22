"""
Blog API Endpoints
Handles blog posts and announcements
"""
from fastapi import APIRouter, Depends, HTTPException, status, Query
from sqlalchemy.orm import Session
from sqlalchemy import and_, or_, desc
from typing import List, Optional
import os
import sys
from datetime import datetime
import time

# Add parent directory to path
sys.path.append(os.path.dirname(os.path.dirname(os.path.abspath(__file__))))

from core.database import get_erp_db, get_moodle_db
from models.moodle_models import Post, MoodleUser
from models.erp_models import UserMapping
from schemas.blog import (
    BlogPostCreate,
    BlogPostUpdate,
    BlogPost,
    BlogPostBasic,
    BlogListResponse,
    BlogSearchFilter
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


@router.get("/posts", response_model=BlogListResponse)
async def get_blog_posts(
    search: Optional[str] = Query(None, description="Search in title and content"),
    tag: Optional[str] = Query(None, description="Filter by tag"),
    publish_state: Optional[str] = Query(None, description="Filter by state (draft, site, public)"),
    page: int = Query(1, ge=1),
    page_size: int = Query(20, ge=1, le=100),
    moodle_db: Session = Depends(get_moodle_db)
):
    """
    Get paginated list of blog posts
    Public posts are visible to all, site posts require authentication
    """
    # Build query - only show published posts by default
    query = moodle_db.query(Post, MoodleUser).outerjoin(
        MoodleUser, Post.userid == MoodleUser.id
    )

    # Filter by publish state
    if publish_state:
        query = query.filter(Post.publishstate == publish_state)
    else:
        # Default: show site and public posts
        query = query.filter(Post.publishstate.in_(["site", "public"]))

    # Search filter
    if search:
        search_pattern = f"%{search}%"
        query = query.filter(
            or_(
                Post.subject.ilike(search_pattern),
                Post.summary.ilike(search_pattern),
                Post.content.ilike(search_pattern)
            )
        )

    # Tag filter
    if tag:
        tag_pattern = f"%{tag}%"
        query = query.filter(Post.tags.ilike(tag_pattern))

    # Get total count
    total = query.count()

    # Apply pagination
    offset = (page - 1) * page_size
    results = query.order_by(desc(Post.created)).offset(offset).limit(page_size).all()

    # Calculate total pages
    total_pages = (total + page_size - 1) // page_size

    posts = []
    for post, user in results:
        author_name = f"{user.firstname} {user.lastname}" if user else "Unknown"

        posts.append(
            BlogPostBasic(
                id=post.id,
                subject=post.subject,
                summary=post.summary,
                tags=post.tags,
                publish_state=post.publishstate,
                author_name=author_name,
                created=datetime.fromtimestamp(post.created)
            )
        )

    return BlogListResponse(
        posts=posts,
        total=total,
        page=page,
        page_size=page_size,
        total_pages=total_pages
    )


@router.get("/posts/{post_id}", response_model=BlogPost)
async def get_blog_post(
    post_id: int,
    moodle_db: Session = Depends(get_moodle_db)
):
    """
    Get detailed blog post by ID
    """
    post = moodle_db.query(Post).filter(Post.id == post_id).first()

    if not post:
        raise HTTPException(
            status_code=status.HTTP_404_NOT_FOUND,
            detail="Blog post not found"
        )

    # Get author info
    user = moodle_db.query(MoodleUser).filter(MoodleUser.id == post.userid).first()
    author_name = f"{user.firstname} {user.lastname}" if user else "Unknown"

    return BlogPost(
        id=post.id,
        subject=post.subject,
        summary=post.summary,
        content=post.content,
        tags=post.tags,
        publish_state=post.publishstate,
        author_id=post.userid,
        author_name=author_name,
        created=datetime.fromtimestamp(post.created),
        last_modified=datetime.fromtimestamp(post.lastmodified),
        user_id=post.userid
    )


@router.post("/posts", response_model=BlogPost, status_code=status.HTTP_201_CREATED)
async def create_blog_post(
    request: BlogPostCreate,
    current_user: dict = Depends(get_current_user),
    moodle_db: Session = Depends(get_moodle_db),
    erp_db: Session = Depends(get_erp_db)
):
    """
    Create new blog post
    """
    # Get Moodle user ID
    user_id = current_user.get("id")
    moodle_user_id = get_moodle_user_id(user_id, erp_db)

    # Create post
    current_time = int(time.time())
    new_post = Post(
        module="blog",
        userid=moodle_user_id,
        courseid=0,  # Site-wide blog
        groupid=0,
        moduleid=0,
        coursemoduleid=0,
        subject=request.subject,
        summary=request.summary,
        summaryformat=1,  # HTML
        content=request.content,
        format=1,  # HTML
        attachment="",
        publishstate=request.publish_state,
        lastmodified=current_time,
        created=current_time,
        usermodified=moodle_user_id
    )

    # Add tags if provided
    if request.tags:
        new_post.tags = request.tags

    moodle_db.add(new_post)
    moodle_db.commit()
    moodle_db.refresh(new_post)

    # Get author info
    user = moodle_db.query(MoodleUser).filter(MoodleUser.id == moodle_user_id).first()
    author_name = f"{user.firstname} {user.lastname}" if user else "Unknown"

    return BlogPost(
        id=new_post.id,
        subject=new_post.subject,
        summary=new_post.summary,
        content=new_post.content,
        tags=new_post.tags,
        publish_state=new_post.publishstate,
        author_id=new_post.userid,
        author_name=author_name,
        created=datetime.fromtimestamp(new_post.created),
        last_modified=datetime.fromtimestamp(new_post.lastmodified),
        user_id=new_post.userid
    )


@router.put("/posts/{post_id}", response_model=BlogPost)
async def update_blog_post(
    post_id: int,
    request: BlogPostUpdate,
    current_user: dict = Depends(get_current_user),
    moodle_db: Session = Depends(get_moodle_db),
    erp_db: Session = Depends(get_erp_db)
):
    """
    Update existing blog post
    Only author can update their own posts
    """
    # Get Moodle user ID
    user_id = current_user.get("id")
    moodle_user_id = get_moodle_user_id(user_id, erp_db)

    # Get post
    post = moodle_db.query(Post).filter(Post.id == post_id).first()

    if not post:
        raise HTTPException(
            status_code=status.HTTP_404_NOT_FOUND,
            detail="Blog post not found"
        )

    # Check ownership (or admin role)
    if post.userid != moodle_user_id and current_user.get("role") != "Admin":
        raise HTTPException(
            status_code=status.HTTP_403_FORBIDDEN,
            detail="You can only edit your own posts"
        )

    # Update fields
    if request.subject is not None:
        post.subject = request.subject
    if request.summary is not None:
        post.summary = request.summary
    if request.content is not None:
        post.content = request.content
    if request.tags is not None:
        post.tags = request.tags
    if request.publish_state is not None:
        post.publishstate = request.publish_state

    post.lastmodified = int(time.time())
    post.usermodified = moodle_user_id

    moodle_db.commit()
    moodle_db.refresh(post)

    # Get author info
    user = moodle_db.query(MoodleUser).filter(MoodleUser.id == post.userid).first()
    author_name = f"{user.firstname} {user.lastname}" if user else "Unknown"

    return BlogPost(
        id=post.id,
        subject=post.subject,
        summary=post.summary,
        content=post.content,
        tags=post.tags,
        publish_state=post.publishstate,
        author_id=post.userid,
        author_name=author_name,
        created=datetime.fromtimestamp(post.created),
        last_modified=datetime.fromtimestamp(post.lastmodified),
        user_id=post.userid
    )


@router.delete("/posts/{post_id}")
async def delete_blog_post(
    post_id: int,
    current_user: dict = Depends(get_current_user),
    moodle_db: Session = Depends(get_moodle_db),
    erp_db: Session = Depends(get_erp_db)
):
    """
    Delete blog post
    Only author or admin can delete posts
    """
    # Get Moodle user ID
    user_id = current_user.get("id")
    moodle_user_id = get_moodle_user_id(user_id, erp_db)

    # Get post
    post = moodle_db.query(Post).filter(Post.id == post_id).first()

    if not post:
        raise HTTPException(
            status_code=status.HTTP_404_NOT_FOUND,
            detail="Blog post not found"
        )

    # Check ownership (or admin role)
    if post.userid != moodle_user_id and current_user.get("role") != "Admin":
        raise HTTPException(
            status_code=status.HTTP_403_FORBIDDEN,
            detail="You can only delete your own posts"
        )

    moodle_db.delete(post)
    moodle_db.commit()

    return {
        "success": True,
        "message": "Blog post deleted successfully",
        "post_id": post_id
    }


@router.get("/my-posts", response_model=List[BlogPostBasic])
async def get_my_blog_posts(
    current_user: dict = Depends(get_current_user),
    moodle_db: Session = Depends(get_moodle_db),
    erp_db: Session = Depends(get_erp_db)
):
    """
    Get current user's blog posts
    """
    # Get Moodle user ID
    user_id = current_user.get("id")
    moodle_user_id = get_moodle_user_id(user_id, erp_db)

    # Get user's posts
    posts = moodle_db.query(Post, MoodleUser).outerjoin(
        MoodleUser, Post.userid == MoodleUser.id
    ).filter(
        Post.userid == moodle_user_id
    ).order_by(desc(Post.created)).all()

    result = []
    for post, user in posts:
        author_name = f"{user.firstname} {user.lastname}" if user else "Unknown"

        result.append(
            BlogPostBasic(
                id=post.id,
                subject=post.subject,
                summary=post.summary,
                tags=post.tags,
                publish_state=post.publishstate,
                author_name=author_name,
                created=datetime.fromtimestamp(post.created)
            )
        )

    return result


@router.get("/tags")
async def get_popular_tags(
    limit: int = Query(20, ge=1, le=100),
    moodle_db: Session = Depends(get_moodle_db)
):
    """
    Get popular blog tags
    """
    # Get all posts with tags
    posts = moodle_db.query(Post.tags).filter(
        and_(
            Post.tags.isnot(None),
            Post.tags != "",
            Post.publishstate.in_(["site", "public"])
        )
    ).all()

    # Count tag occurrences
    tag_counts = {}
    for (tags_str,) in posts:
        if tags_str:
            tags = [t.strip() for t in tags_str.split(",")]
            for tag in tags:
                if tag:
                    tag_counts[tag] = tag_counts.get(tag, 0) + 1

    # Sort by count and take top N
    popular_tags = sorted(tag_counts.items(), key=lambda x: x[1], reverse=True)[:limit]

    return {
        "tags": [
            {"tag": tag, "count": count}
            for tag, count in popular_tags
        ]
    }

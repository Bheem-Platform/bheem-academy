"""
Blog Schemas
Pydantic models for blog posts and announcements
"""
from pydantic import BaseModel, Field
from typing import Optional, List
from datetime import datetime


class BlogPostCreate(BaseModel):
    """Create blog post request"""
    subject: str = Field(..., min_length=1, max_length=255)
    summary: str = Field(..., min_length=1)
    content: str = Field(..., min_length=1)
    tags: Optional[str] = Field(None, description="Comma-separated tags")
    publish_state: str = Field("draft", pattern="^(draft|site|public)$")


class BlogPostUpdate(BaseModel):
    """Update blog post request"""
    subject: Optional[str] = Field(None, min_length=1, max_length=255)
    summary: Optional[str] = None
    content: Optional[str] = None
    tags: Optional[str] = None
    publish_state: Optional[str] = Field(None, pattern="^(draft|site|public)$")


class BlogPost(BaseModel):
    """Blog post response"""
    id: int
    subject: str
    summary: Optional[str] = None
    content: Optional[str] = None
    tags: Optional[str] = None
    publish_state: str
    author_id: int
    author_name: Optional[str] = None
    created: datetime
    last_modified: datetime
    user_id: int

    class Config:
        from_attributes = True


class BlogPostBasic(BaseModel):
    """Basic blog post info for lists"""
    id: int
    subject: str
    summary: Optional[str] = None
    tags: Optional[str] = None
    publish_state: str
    author_name: Optional[str] = None
    created: datetime

    class Config:
        from_attributes = True


class BlogListResponse(BaseModel):
    """Paginated blog list"""
    posts: List[BlogPostBasic]
    total: int
    page: int
    page_size: int
    total_pages: int


class BlogSearchFilter(BaseModel):
    """Blog search and filter parameters"""
    search: Optional[str] = Field(None, description="Search in title and content")
    tag: Optional[str] = Field(None, description="Filter by tag")
    publish_state: Optional[str] = Field(None, description="Filter by state")
    page: int = Field(1, ge=1)
    page_size: int = Field(20, ge=1, le=100)

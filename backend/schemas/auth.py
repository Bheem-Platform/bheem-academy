"""
Authentication Schemas
Pydantic models for auth request/response validation
"""
from pydantic import BaseModel, EmailStr, Field, validator
from typing import Optional
from datetime import datetime
from uuid import UUID


class RegisterRequest(BaseModel):
    """User registration request"""
    username: str = Field(..., min_length=3, max_length=50)
    email: EmailStr
    password: str = Field(..., min_length=8, max_length=100)
    first_name: str = Field(..., min_length=1, max_length=100)
    last_name: str = Field(..., min_length=1, max_length=100)
    role: str = Field(default="Customer", pattern="^(Customer|Teacher|Admin)$")

    @validator('username')
    def username_alphanumeric(cls, v):
        """Ensure username is alphanumeric with underscores/hyphens"""
        if not v.replace('_', '').replace('-', '').isalnum():
            raise ValueError('Username must be alphanumeric with optional underscores/hyphens')
        return v.lower()


class LoginRequest(BaseModel):
    """User login request"""
    username: str = Field(..., min_length=3)
    password: str = Field(..., min_length=1)


class TokenResponse(BaseModel):
    """JWT token response"""
    access_token: str
    token_type: str = "bearer"
    expires_in: int = 86400  # 24 hours
    user_id: UUID
    username: str
    role: str


class UserResponse(BaseModel):
    """User profile response"""
    id: UUID
    username: str
    email: Optional[str] = None
    role: str
    first_name: Optional[str] = None
    last_name: Optional[str] = None
    is_active: bool
    company_code: str
    moodle_user_id: Optional[int] = None
    created_at: Optional[datetime] = None

    class Config:
        from_attributes = True


class PasswordResetRequest(BaseModel):
    """Password reset request"""
    email: EmailStr


class PasswordResetConfirm(BaseModel):
    """Confirm password reset with token"""
    token: str = Field(..., min_length=20)
    new_password: str = Field(..., min_length=8, max_length=100)


class ChangePasswordRequest(BaseModel):
    """Change password for authenticated user"""
    current_password: str
    new_password: str = Field(..., min_length=8, max_length=100)

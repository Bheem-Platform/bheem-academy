"""
Authentication API Endpoints
Handles user authentication via Bheem Passport integration
"""
from fastapi import APIRouter, Depends, HTTPException, status, Header
from sqlalchemy.orm import Session
from sqlalchemy import select
from typing import Optional
import os
import sys

# Add parent directory to path
sys.path.append(os.path.dirname(os.path.dirname(os.path.abspath(__file__))))

from core.database import get_erp_db, get_moodle_db
from models.erp_models import AuthUser, Person, UserMapping
from models.moodle_models import MoodleUser
from schemas.auth import (
    RegisterRequest,
    LoginRequest,
    TokenResponse,
    UserResponse,
    PasswordResetRequest,
    ChangePasswordRequest
)
from platform_auth_client import BheemPlatformAuthClient

router = APIRouter()


# Dependency: Get current user from JWT token
async def get_current_user(
    authorization: Optional[str] = Header(None),
    erp_db: Session = Depends(get_erp_db)
) -> dict:
    """Extract and validate user from JWT token"""
    if not authorization or not authorization.startswith("Bearer "):
        raise HTTPException(
            status_code=status.HTTP_401_UNAUTHORIZED,
            detail="Missing or invalid authorization header"
        )

    token = authorization.replace("Bearer ", "")

    # Validate token with Bheem Passport
    auth_client = BheemPlatformAuthClient()
    try:
        user_data = await auth_client.get_current_user(token)

        if not user_data or "id" not in user_data:
            raise HTTPException(
                status_code=status.HTTP_401_UNAUTHORIZED,
                detail="Invalid token"
            )

        return user_data
    except Exception as e:
        raise HTTPException(
            status_code=status.HTTP_401_UNAUTHORIZED,
            detail=f"Token validation failed: {str(e)}"
        )


@router.post("/register", response_model=UserResponse, status_code=status.HTTP_201_CREATED)
async def register(
    request: RegisterRequest,
    erp_db: Session = Depends(get_erp_db),
    moodle_db: Session = Depends(get_moodle_db)
):
    """
    Register new user via Bheem Passport
    Creates user in ERP and corresponding Moodle user record
    """
    auth_client = BheemPlatformAuthClient()

    try:
        # Register via Bheem Passport
        result = await auth_client.register(
            username=request.username,
            email=request.email,
            password=request.password,
            first_name=request.first_name,
            last_name=request.last_name,
            role=request.role
        )

        if "error" in result:
            raise HTTPException(
                status_code=status.HTTP_400_BAD_REQUEST,
                detail=result["error"]
            )

        user_id = result.get("user_id")

        # Get created user from ERP
        erp_user = erp_db.query(AuthUser).filter(AuthUser.id == user_id).first()
        if not erp_user:
            raise HTTPException(
                status_code=status.HTTP_500_INTERNAL_SERVER_ERROR,
                detail="User created in Passport but not found in ERP"
            )

        # Create corresponding Moodle user record
        moodle_user = MoodleUser(
            username=request.username.lower(),
            firstname=request.first_name,
            lastname=request.last_name,
            email=request.email,
            confirmed=1,
            mnethostid=1,
            auth="manual",
            password="not cached",  # Password managed by Passport
            timecreated=int(result.get("created_at", 0)),
            timemodified=int(result.get("created_at", 0))
        )
        moodle_db.add(moodle_user)
        moodle_db.commit()
        moodle_db.refresh(moodle_user)

        # Create mapping between ERP and Moodle user
        mapping = UserMapping(
            erp_user_id=user_id,
            moodle_user_id=moodle_user.id
        )
        erp_db.add(mapping)
        erp_db.commit()

        # Get person details
        person = erp_db.query(Person).filter(Person.id == erp_user.person_id).first()

        return UserResponse(
            id=erp_user.id,
            username=erp_user.username,
            email=request.email,
            role=erp_user.role,
            first_name=person.first_name if person else None,
            last_name=person.last_name if person else None,
            is_active=erp_user.is_active,
            company_code=os.getenv("BHEEM_COMPANY_CODE", "BHM008"),
            moodle_user_id=moodle_user.id,
            created_at=erp_user.created_at
        )

    except HTTPException:
        raise
    except Exception as e:
        erp_db.rollback()
        moodle_db.rollback()
        raise HTTPException(
            status_code=status.HTTP_500_INTERNAL_SERVER_ERROR,
            detail=f"Registration failed: {str(e)}"
        )


@router.post("/login", response_model=TokenResponse)
async def login(
    request: LoginRequest,
    erp_db: Session = Depends(get_erp_db)
):
    """
    Authenticate user via Bheem Passport
    Returns JWT access token
    """
    auth_client = BheemPlatformAuthClient()

    try:
        # Authenticate via Bheem Passport
        result = await auth_client.login(
            username=request.username,
            password=request.password
        )

        if "error" in result:
            raise HTTPException(
                status_code=status.HTTP_401_UNAUTHORIZED,
                detail=result["error"]
            )

        access_token = result.get("access_token")
        if not access_token:
            raise HTTPException(
                status_code=status.HTTP_401_UNAUTHORIZED,
                detail="Authentication failed"
            )

        # Get user details from ERP
        user_id = result.get("user_id")
        erp_user = erp_db.query(AuthUser).filter(AuthUser.id == user_id).first()

        if not erp_user:
            raise HTTPException(
                status_code=status.HTTP_404_NOT_FOUND,
                detail="User not found in ERP database"
            )

        return TokenResponse(
            access_token=access_token,
            token_type="bearer",
            expires_in=result.get("expires_in", 86400),
            user_id=erp_user.id,
            username=erp_user.username,
            role=erp_user.role
        )

    except HTTPException:
        raise
    except Exception as e:
        raise HTTPException(
            status_code=status.HTTP_500_INTERNAL_SERVER_ERROR,
            detail=f"Login failed: {str(e)}"
        )


@router.get("/me", response_model=UserResponse)
async def get_current_user_info(
    current_user: dict = Depends(get_current_user),
    erp_db: Session = Depends(get_erp_db)
):
    """
    Get current authenticated user's profile
    """
    user_id = current_user.get("id")

    # Get user from ERP
    erp_user = erp_db.query(AuthUser).filter(AuthUser.id == user_id).first()
    if not erp_user:
        raise HTTPException(
            status_code=status.HTTP_404_NOT_FOUND,
            detail="User not found"
        )

    # Get person details
    person = erp_db.query(Person).filter(Person.id == erp_user.person_id).first()

    # Get Moodle user mapping
    mapping = erp_db.query(UserMapping).filter(UserMapping.erp_user_id == user_id).first()

    return UserResponse(
        id=erp_user.id,
        username=erp_user.username,
        email=current_user.get("email"),
        role=erp_user.role,
        first_name=person.first_name if person else None,
        last_name=person.last_name if person else None,
        is_active=erp_user.is_active,
        company_code=os.getenv("BHEEM_COMPANY_CODE", "BHM008"),
        moodle_user_id=mapping.moodle_user_id if mapping else None,
        created_at=erp_user.created_at
    )


@router.post("/logout")
async def logout(current_user: dict = Depends(get_current_user)):
    """
    Logout user (client should discard token)
    Note: JWT tokens remain valid until expiry, implement token blacklist if needed
    """
    return {
        "message": "Logged out successfully",
        "user_id": current_user.get("id")
    }


@router.post("/password-reset")
async def request_password_reset(request: PasswordResetRequest):
    """
    Request password reset email
    Proxies to Bheem Passport password reset
    """
    auth_client = BheemPlatformAuthClient()

    try:
        result = await auth_client.request_password_reset(request.email)

        return {
            "message": "Password reset email sent if account exists",
            "email": request.email
        }

    except Exception as e:
        # Don't reveal if email exists or not for security
        return {
            "message": "Password reset email sent if account exists",
            "email": request.email
        }


@router.post("/change-password")
async def change_password(
    request: ChangePasswordRequest,
    current_user: dict = Depends(get_current_user)
):
    """
    Change password for authenticated user
    Proxies to Bheem Passport
    """
    auth_client = BheemPlatformAuthClient()

    try:
        result = await auth_client.change_password(
            user_id=current_user.get("id"),
            current_password=request.current_password,
            new_password=request.new_password
        )

        if "error" in result:
            raise HTTPException(
                status_code=status.HTTP_400_BAD_REQUEST,
                detail=result["error"]
            )

        return {
            "message": "Password changed successfully",
            "user_id": current_user.get("id")
        }

    except HTTPException:
        raise
    except Exception as e:
        raise HTTPException(
            status_code=status.HTTP_500_INTERNAL_SERVER_ERROR,
            detail=f"Password change failed: {str(e)}"
        )


@router.get("/verify-token")
async def verify_token(current_user: dict = Depends(get_current_user)):
    """
    Verify if current JWT token is valid
    """
    return {
        "valid": True,
        "user_id": current_user.get("id"),
        "username": current_user.get("username"),
        "role": current_user.get("role")
    }

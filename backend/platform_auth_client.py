"""
Bheem Platform Auth Client
HTTP client for module authentication via platform.bheem.co.uk
Replaces direct database access to ERP
"""

import httpx
from typing import Optional, Dict, Any
from fastapi import HTTPException, status
import os
import logging

logger = logging.getLogger(__name__)


class BheemPlatformAuthClient:
    """Client for authenticating modules via Bheem Platform"""

    def __init__(self):
        # Use Passport via platform.bheem.co.uk gateway
        # Routes to bheem-gateway → passport:8003
        self.base_url = os.getenv("BHEEM_PASSPORT_URL", "https://platform.bheem.co.uk")
        self.company_code = os.getenv("BHEEM_COMPANY_CODE", "BHM004")
        self.timeout = 10.0

    async def register(
        self,
        username: str,
        email: str,
        password: str,
        first_name: str = None,
        last_name: str = None,
        role: str = "Customer"
    ) -> Dict[str, Any]:
        """
        Register a new user via Bheem Platform

        Args:
            username: Unique username
            email: User email address
            password: User password
            first_name: User's first name (optional)
            last_name: User's last name (optional)
            role: User role (default: Customer)

        Returns:
            Dict containing:
            - access_token: JWT access token
            - refresh_token: JWT refresh token
            - user: { id, username, role, person_id, company_id }

        Raises:
            HTTPException: If registration fails
        """
        # Step 1: Register user (creates auth.users record)
        register_url = f"{self.base_url}/api/v1/auth/register"

        payload = {
            "username": username,
            "email": email,
            "password": password,
            "role": role,
            "company_code": self.company_code
        }

        # Add optional fields if provided
        if first_name:
            payload["first_name"] = first_name
        if last_name:
            payload["last_name"] = last_name

        logger.info(f"Registering user via Passport: {username}")

        try:
            async with httpx.AsyncClient(timeout=self.timeout, verify=False) as client:
                # Step 1: Register user
                response = await client.post(register_url, json=payload)

                if response.status_code == 400:
                    error_detail = response.json().get("detail", "Registration failed")
                    logger.error(f"Registration failed for {username}: {error_detail}")
                    raise HTTPException(
                        status_code=status.HTTP_400_BAD_REQUEST,
                        detail=error_detail
                    )
                elif response.status_code != 200:
                    logger.error(f"Passport API error: {response.status_code} - {response.text}")
                    raise HTTPException(
                        status_code=status.HTTP_500_INTERNAL_SERVER_ERROR,
                        detail=f"Registration service error: {response.text}"
                    )

                user_data = response.json()
                logger.info(f"User registered successfully: {username}")
                logger.info(f"Passport registration response: {user_data}")

                # Step 2: Auto-login to get tokens
                login_url = f"{self.base_url}/api/v1/auth/login"
                login_response = await client.post(
                    login_url,
                    data={"username": username, "password": password}
                )

                if login_response.status_code != 200:
                    logger.error(f"Auto-login failed: {login_response.status_code}")
                    raise HTTPException(
                        status_code=status.HTTP_500_INTERNAL_SERVER_ERROR,
                        detail="User created but auto-login failed"
                    )

                token_data = login_response.json()
                logger.info(f"Auto-login successful, tokens generated")

                # Merge user data and token data
                result = {
                    **token_data,  # Contains: access_token, refresh_token, token_type, expires_in, user
                    "user_id": user_data["id"]  # Add user_id for backward compatibility
                }

                return result

        except httpx.TimeoutException:
            logger.error("Platform API timeout")
            raise HTTPException(
                status_code=status.HTTP_503_SERVICE_UNAVAILABLE,
                detail="Platform authentication service timeout"
            )
        except httpx.RequestError as e:
            logger.error(f"Platform API connection error: {e}")
            raise HTTPException(
                status_code=status.HTTP_503_SERVICE_UNAVAILABLE,
                detail=f"Cannot connect to platform: {str(e)}"
            )

    async def login(
        self,
        username: str,
        password: str
    ) -> Dict[str, Any]:
        """
        Authenticate user via Bheem Platform

        Args:
            username: Username or email
            password: User password

        Returns:
            Dict containing:
            - access_token: JWT access token
            - refresh_token: JWT refresh token
            - user: User information

        Raises:
            HTTPException: If authentication fails
        """
        url = f"{self.base_url}/api/v1/auth/login"

        headers = {"X-Company-Code": self.company_code}

        # OAuth2PasswordRequestForm format
        form_data = {
            "username": username,
            "password": password
        }

        logger.info(f"Authenticating user via Platform API: {username}")

        try:
            async with httpx.AsyncClient(timeout=self.timeout, verify=False) as client:
                response = await client.post(
                    url,
                    data=form_data,
                    headers=headers
                )

                if response.status_code == 401:
                    logger.warning(f"Invalid credentials for {username}")
                    raise HTTPException(
                        status_code=status.HTTP_401_UNAUTHORIZED,
                        detail="Invalid credentials"
                    )
                elif response.status_code == 403:
                    logger.warning(f"Account inactive for {username}")
                    raise HTTPException(
                        status_code=status.HTTP_403_FORBIDDEN,
                        detail="Account is inactive or banned"
                    )
                elif response.status_code != 200:
                    logger.error(f"Platform API error: {response.status_code} - {response.text}")
                    raise HTTPException(
                        status_code=status.HTTP_500_INTERNAL_SERVER_ERROR,
                        detail=f"Authentication service error: {response.text}"
                    )

                result = response.json()
                logger.info(f"User authenticated successfully: {username}")
                return result

        except httpx.TimeoutException:
            logger.error("Platform API timeout")
            raise HTTPException(
                status_code=status.HTTP_503_SERVICE_UNAVAILABLE,
                detail="Platform authentication service timeout"
            )
        except httpx.RequestError as e:
            logger.error(f"Platform API connection error: {e}")
            raise HTTPException(
                status_code=status.HTTP_503_SERVICE_UNAVAILABLE,
                detail=f"Cannot connect to platform: {str(e)}"
            )

    async def validate_token(self, token: str) -> Dict[str, Any]:
        """
        Validate a JWT token with Bheem Platform

        Args:
            token: JWT access token

        Returns:
            Dict containing validation result and user payload

        Raises:
            HTTPException: If token is invalid
        """
        url = f"{self.base_url}/api/v1/auth/me"

        headers = {"Authorization": f"Bearer {token}"}

        try:
            async with httpx.AsyncClient(timeout=self.timeout, verify=False) as client:
                response = await client.get(url, headers=headers)

                if response.status_code == 401:
                    raise HTTPException(
                        status_code=status.HTTP_401_UNAUTHORIZED,
                        detail="Invalid or expired token"
                    )
                elif response.status_code != 200:
                    raise HTTPException(
                        status_code=status.HTTP_500_INTERNAL_SERVER_ERROR,
                        detail=f"Token validation error: {response.text}"
                    )

                return response.json()

        except httpx.TimeoutException:
            raise HTTPException(
                status_code=status.HTTP_503_SERVICE_UNAVAILABLE,
                detail="Platform authentication service timeout"
            )
        except httpx.RequestError as e:
            raise HTTPException(
                status_code=status.HTTP_503_SERVICE_UNAVAILABLE,
                detail=f"Cannot connect to platform: {str(e)}"
            )

    async def get_current_user(self, token: str) -> Dict[str, Any]:
        """
        Get current user information from token

        Args:
            token: JWT access token

        Returns:
            Dict containing user information

        Raises:
            HTTPException: If token is invalid
        """
        url = f"{self.base_url}/api/v1/auth/me"

        headers = {"Authorization": f"Bearer {token}"}

        try:
            async with httpx.AsyncClient(timeout=self.timeout, verify=False) as client:
                response = await client.get(url, headers=headers)

                if response.status_code == 401:
                    raise HTTPException(
                        status_code=status.HTTP_401_UNAUTHORIZED,
                        detail="Invalid or expired token"
                    )
                elif response.status_code != 200:
                    raise HTTPException(
                        status_code=status.HTTP_500_INTERNAL_SERVER_ERROR,
                        detail=f"User info error: {response.text}"
                    )

                return response.json()

        except httpx.TimeoutException:
            raise HTTPException(
                status_code=status.HTTP_503_SERVICE_UNAVAILABLE,
                detail="Platform authentication service timeout"
            )
        except httpx.RequestError as e:
            raise HTTPException(
                status_code=status.HTTP_503_SERVICE_UNAVAILABLE,
                detail=f"Cannot connect to platform: {str(e)}"
            )

    async def refresh_token(self, refresh_token: str) -> Dict[str, Any]:
        """
        Refresh access token using refresh token

        Args:
            refresh_token: JWT refresh token

        Returns:
            Dict containing new access_token and refresh_token

        Raises:
            HTTPException: If refresh token is invalid
        """
        url = f"{self.base_url}/api/auth/refresh"

        payload = {"refresh_token": refresh_token}

        try:
            async with httpx.AsyncClient(timeout=self.timeout, verify=False) as client:
                response = await client.post(url, json=payload)

                if response.status_code == 401:
                    raise HTTPException(
                        status_code=status.HTTP_401_UNAUTHORIZED,
                        detail="Invalid refresh token"
                    )
                elif response.status_code == 403:
                    raise HTTPException(
                        status_code=status.HTTP_403_FORBIDDEN,
                        detail="User account is inactive"
                    )
                elif response.status_code != 200:
                    raise HTTPException(
                        status_code=status.HTTP_500_INTERNAL_SERVER_ERROR,
                        detail=f"Token refresh error: {response.text}"
                    )

                return response.json()

        except httpx.TimeoutException:
            raise HTTPException(
                status_code=status.HTTP_503_SERVICE_UNAVAILABLE,
                detail="Platform authentication service timeout"
            )
        except httpx.RequestError as e:
            raise HTTPException(
                status_code=status.HTTP_503_SERVICE_UNAVAILABLE,
                detail=f"Cannot connect to platform: {str(e)}"
            )

    async def request_password_reset(self, email: str) -> Dict[str, Any]:
        """
        Request password reset email

        Args:
            email: User email address

        Returns:
            Dict containing success message

        Raises:
            HTTPException: If request fails
        """
        url = f"{self.base_url}/api/v1/auth/password-reset"

        payload = {"email": email}

        try:
            async with httpx.AsyncClient(timeout=self.timeout, verify=False) as client:
                response = await client.post(url, json=payload)

                if response.status_code == 200:
                    return response.json()
                else:
                    # Don't reveal if email exists
                    return {"message": "Password reset email sent if account exists"}

        except httpx.TimeoutException:
            raise HTTPException(
                status_code=status.HTTP_503_SERVICE_UNAVAILABLE,
                detail="Platform authentication service timeout"
            )
        except httpx.RequestError as e:
            raise HTTPException(
                status_code=status.HTTP_503_SERVICE_UNAVAILABLE,
                detail=f"Cannot connect to platform: {str(e)}"
            )

    async def change_password(
        self,
        user_id: str,
        current_password: str,
        new_password: str
    ) -> Dict[str, Any]:
        """
        Change user password

        Args:
            user_id: User ID
            current_password: Current password
            new_password: New password

        Returns:
            Dict containing success message

        Raises:
            HTTPException: If password change fails
        """
        url = f"{self.base_url}/api/v1/auth/change-password"

        payload = {
            "user_id": user_id,
            "current_password": current_password,
            "new_password": new_password
        }

        try:
            async with httpx.AsyncClient(timeout=self.timeout, verify=False) as client:
                response = await client.post(url, json=payload)

                if response.status_code == 401:
                    raise HTTPException(
                        status_code=status.HTTP_401_UNAUTHORIZED,
                        detail="Current password is incorrect"
                    )
                elif response.status_code == 400:
                    error_detail = response.json().get("detail", "Invalid password")
                    raise HTTPException(
                        status_code=status.HTTP_400_BAD_REQUEST,
                        detail=error_detail
                    )
                elif response.status_code != 200:
                    raise HTTPException(
                        status_code=status.HTTP_500_INTERNAL_SERVER_ERROR,
                        detail=f"Password change error: {response.text}"
                    )

                return response.json()

        except httpx.TimeoutException:
            raise HTTPException(
                status_code=status.HTTP_503_SERVICE_UNAVAILABLE,
                detail="Platform authentication service timeout"
            )
        except httpx.RequestError as e:
            raise HTTPException(
                status_code=status.HTTP_503_SERVICE_UNAVAILABLE,
                detail=f"Cannot connect to platform: {str(e)}"
            )


# Singleton instance
_platform_auth_client: Optional[BheemPlatformAuthClient] = None


def get_platform_auth_client() -> BheemPlatformAuthClient:
    """Get or create BheemPlatformAuthClient singleton instance"""
    global _platform_auth_client
    if _platform_auth_client is None:
        _platform_auth_client = BheemPlatformAuthClient()
    return _platform_auth_client


# Convenience instance for direct import
platform_auth = get_platform_auth_client()

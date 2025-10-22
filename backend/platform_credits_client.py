"""
Platform Credits Client for SocialSelling Module
Integrates with bheem-credits service (backend.agentbheem.com)
"""

import httpx
from typing import Dict, Any, Optional
from decimal import Decimal
from datetime import datetime
import logging
from enum import Enum

logger = logging.getLogger(__name__)


class UsageType(str, Enum):
    """Usage types for credit deduction"""
    API_CALLS = "api_calls"
    STORAGE_GB = "storage_gb"
    USERS = "users"
    TRANSACTIONS = "transactions"
    AI_TOKENS = "ai_tokens"
    EMAILS = "emails"
    SMS = "sms"


class InsufficientCreditsError(Exception):
    """Raised when company doesn't have enough credits"""
    pass


class PlatformCreditsClient:
    """
    Client for interacting with Platform Credits API
    """

    def __init__(self, base_url: str = "http://157.180.122.188:8004", timeout: float = 10.0):
        """
        Initialize credits client

        Args:
            base_url: Base URL of bheem-credits service
            timeout: Request timeout in seconds
        """
        self.base_url = base_url
        self.timeout = timeout

    async def get_balance(self, company_id: str) -> Dict[str, Any]:
        """
        Get current credit balance for a company

        Args:
            company_id: Company UUID

        Returns:
            Credit balance information

        Example:
            {
                "company_id": "uuid",
                "available_credits": 5000.00,
                "total_purchased": 10000.00,
                "total_used": 5000.00,
                "plan_type": "professional",
                "plan_expires_at": "2025-11-10T00:00:00"
            }
        """
        url = f"{self.base_url}/api/v1/credits/balance/{company_id}"

        async with httpx.AsyncClient(timeout=self.timeout, verify=False) as client:
            response = await client.get(url)

            if response.status_code == 404:
                logger.warning(f"Company not found: {company_id}")
                return {
                    "company_id": company_id,
                    "available_credits": 0,
                    "total_purchased": 0,
                    "total_used": 0,
                    "plan_type": "starter",
                    "plan_expires_at": None
                }

            response.raise_for_status()
            return response.json()

    async def check_sufficient_credits(
        self,
        company_id: str,
        usage_type: UsageType,
        quantity: float = 1.0
    ) -> bool:
        """
        Check if company has sufficient credits for an operation

        Args:
            company_id: Company UUID
            usage_type: Type of usage (AI_TOKENS, API_CALLS, etc.)
            quantity: Quantity to check

        Returns:
            True if sufficient credits, False otherwise
        """
        try:
            balance = await self.get_balance(company_id)
            available = float(balance.get("available_credits", 0))

            # Get pricing (from bheem-credits USAGE_PRICING)
            pricing = {
                UsageType.API_CALLS: 0.01,
                UsageType.STORAGE_GB: 10.0,
                UsageType.USERS: 50.0,
                UsageType.TRANSACTIONS: 0.1,
                UsageType.AI_TOKENS: 0.001,
                UsageType.EMAILS: 0.05,
                UsageType.SMS: 0.1
            }

            required = quantity * pricing.get(usage_type, 1.0)
            return available >= required

        except Exception as e:
            logger.error(f"Error checking credits: {e}")
            return False

    async def record_usage(
        self,
        company_id: str,
        usage_type: UsageType,
        quantity: float,
        metadata: Optional[Dict] = None
    ) -> Dict[str, Any]:
        """
        Record usage and deduct credits

        Args:
            company_id: Company UUID
            usage_type: Type of usage
            quantity: Amount used
            metadata: Additional metadata

        Returns:
            Usage record response

        Raises:
            InsufficientCreditsError: If not enough credits
        """
        url = f"{self.base_url}/api/v1/credits/usage/record"

        payload = {
            "company_id": company_id,
            "usage_type": usage_type.value,
            "quantity": quantity,
            "metadata": metadata or {}
        }

        async with httpx.AsyncClient(timeout=self.timeout, verify=False) as client:
            response = await client.post(url, json=payload)

            if response.status_code == 402:
                error_data = response.json()
                raise InsufficientCreditsError(
                    error_data.get("detail", "Insufficient credits")
                )

            response.raise_for_status()
            return response.json()

    async def get_plans(self) -> list:
        """
        Get all available subscription plans

        Returns:
            List of subscription plans
        """
        url = f"{self.base_url}/api/v1/credits/plans"

        async with httpx.AsyncClient(timeout=self.timeout, verify=False) as client:
            response = await client.get(url)
            response.raise_for_status()
            return response.json()

    async def purchase_credits(
        self,
        company_id: str,
        amount: Decimal,
        description: str = "Credit purchase",
        metadata: Optional[Dict] = None
    ) -> Dict[str, Any]:
        """
        Purchase additional credits

        Args:
            company_id: Company UUID
            amount: Credits to purchase
            description: Purchase description
            metadata: Additional metadata

        Returns:
            Purchase confirmation
        """
        url = f"{self.base_url}/api/v1/credits/purchase"

        payload = {
            "company_id": company_id,
            "amount": float(amount),
            "transaction_type": "purchase",
            "description": description,
            "metadata": metadata or {}
        }

        async with httpx.AsyncClient(timeout=self.timeout, verify=False) as client:
            response = await client.post(url, json=payload)
            response.raise_for_status()
            return response.json()

    async def get_usage_summary(
        self,
        company_id: str,
        start_date: Optional[datetime] = None,
        end_date: Optional[datetime] = None
    ) -> Dict[str, Any]:
        """
        Get usage summary for a company

        Args:
            company_id: Company UUID
            start_date: Start date (optional)
            end_date: End date (optional)

        Returns:
            Usage summary
        """
        url = f"{self.base_url}/api/v1/credits/usage/summary/{company_id}"

        params = {}
        if start_date:
            params["start_date"] = start_date.isoformat()
        if end_date:
            params["end_date"] = end_date.isoformat()

        async with httpx.AsyncClient(timeout=self.timeout, verify=False) as client:
            response = await client.get(url, params=params)
            response.raise_for_status()
            return response.json()

    async def get_credit_transactions(
        self,
        company_id: str,
        limit: int = 50,
        offset: int = 0
    ) -> Dict[str, Any]:
        """
        Get credit transaction history

        Args:
            company_id: Company UUID
            limit: Maximum number of transactions
            offset: Pagination offset

        Returns:
            Transaction history
        """
        url = f"{self.base_url}/api/v1/credits/transactions/{company_id}"

        params = {"limit": limit, "offset": offset}

        async with httpx.AsyncClient(timeout=self.timeout, verify=False) as client:
            response = await client.get(url, params=params)
            response.raise_for_status()
            return response.json()

    async def upgrade_subscription(
        self,
        company_id: str,
        new_plan: str
    ) -> Dict[str, Any]:
        """
        Upgrade or downgrade subscription plan

        Args:
            company_id: Company UUID
            new_plan: New plan type (starter, professional, enterprise)

        Returns:
            Upgrade confirmation
        """
        url = f"{self.base_url}/api/v1/credits/subscription/upgrade"

        params = {"company_id": company_id, "new_plan": new_plan}

        async with httpx.AsyncClient(timeout=self.timeout, verify=False) as client:
            response = await client.post(url, params=params)
            response.raise_for_status()
            return response.json()

    async def get_usage_limits(self, company_id: str) -> Dict[str, Any]:
        """
        Get current usage limits based on subscription plan

        Args:
            company_id: Company UUID

        Returns:
            Usage limits and current usage
        """
        url = f"{self.base_url}/api/v1/credits/limits/{company_id}"

        async with httpx.AsyncClient(timeout=self.timeout, verify=False) as client:
            response = await client.get(url)
            response.raise_for_status()
            return response.json()


# Global instance
credits_client = PlatformCreditsClient()


# Helper functions for common operations

async def deduct_ai_credits(company_id: str, tokens: int, metadata: Optional[Dict] = None):
    """
    Deduct credits for AI token usage

    Args:
        company_id: Company UUID
        tokens: Number of AI tokens used
        metadata: Additional metadata (model, operation, etc.)
    """
    return await credits_client.record_usage(
        company_id=company_id,
        usage_type=UsageType.AI_TOKENS,
        quantity=tokens,
        metadata=metadata
    )


async def deduct_api_credits(company_id: str, calls: int = 1, metadata: Optional[Dict] = None):
    """
    Deduct credits for API calls

    Args:
        company_id: Company UUID
        calls: Number of API calls
        metadata: Additional metadata (endpoint, method, etc.)
    """
    return await credits_client.record_usage(
        company_id=company_id,
        usage_type=UsageType.API_CALLS,
        quantity=calls,
        metadata=metadata
    )


async def deduct_email_credits(company_id: str, emails: int = 1, metadata: Optional[Dict] = None):
    """
    Deduct credits for email sending

    Args:
        company_id: Company UUID
        emails: Number of emails sent
        metadata: Additional metadata
    """
    return await credits_client.record_usage(
        company_id=company_id,
        usage_type=UsageType.EMAILS,
        quantity=emails,
        metadata=metadata
    )


async def deduct_sms_credits(company_id: str, sms_count: int = 1, metadata: Optional[Dict] = None):
    """
    Deduct credits for SMS sending

    Args:
        company_id: Company UUID
        sms_count: Number of SMS sent
        metadata: Additional metadata
    """
    return await credits_client.record_usage(
        company_id=company_id,
        usage_type=UsageType.SMS,
        quantity=sms_count,
        metadata=metadata
    )

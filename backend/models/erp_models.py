"""
SQLAlchemy models for ERP database tables
"""
from sqlalchemy import Column, String, Text, Boolean, Integer, ForeignKey
from sqlalchemy.dialects.postgresql import UUID
from sqlalchemy.sql import text
from core.database import ERPBase
import uuid


class Company(ERPBase):
    """Company table from ERP"""
    __tablename__ = "companies"
    __table_args__ = {'schema': 'public'}

    id = Column(UUID(as_uuid=True), primary_key=True, default=uuid.uuid4)
    company_code = Column(String(20), unique=True, nullable=False)
    company_name = Column(String(200), nullable=False)
    legal_name = Column(String(300))
    company_type = Column(String(20), nullable=False)
    parent_company_id = Column(UUID(as_uuid=True), ForeignKey('public.companies.id'))
    is_active = Column(Boolean, default=True)


class Person(ERPBase):
    """Person table from ERP"""
    __tablename__ = "persons"
    __table_args__ = {'schema': 'public'}

    id = Column(UUID(as_uuid=True), primary_key=True, default=uuid.uuid4)
    person_type = Column(String(20), nullable=False)
    first_name = Column(String(100), nullable=False)
    last_name = Column(String(100), nullable=False)
    middle_name = Column(String(100))
    preferred_name = Column(String(100))
    company_id = Column(UUID(as_uuid=True), ForeignKey('public.companies.id'), nullable=False)
    is_active = Column(Boolean, default=True)


class AuthUser(ERPBase):
    """Auth users table from ERP"""
    __tablename__ = "users"
    __table_args__ = {'schema': 'auth'}

    id = Column(UUID(as_uuid=True), primary_key=True, default=uuid.uuid4)
    username = Column(String(100), unique=True, nullable=False)
    hashed_password = Column(String(255), nullable=False)
    role = Column(String(20), nullable=False)
    company_id = Column(UUID(as_uuid=True), ForeignKey('public.companies.id'))
    person_id = Column(UUID(as_uuid=True), ForeignKey('public.persons.id'))
    is_active = Column(Boolean, default=True)
    is_banned = Column(Boolean, default=False)
    token_version = Column(Integer, default=0)
    auth_provider = Column(String(50), default='local')


class UserMapping(ERPBase):
    """Academy user mapping table - links ERP users to Moodle users"""
    __tablename__ = "user_mappings"
    __table_args__ = {'schema': 'academy'}

    id = Column(UUID(as_uuid=True), primary_key=True, server_default=text('gen_random_uuid()'))
    erp_user_id = Column(UUID(as_uuid=True), ForeignKey('auth.users.id', ondelete='CASCADE'), nullable=False, unique=True)
    moodle_user_id = Column(Integer, nullable=False, unique=True)

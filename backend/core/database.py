"""
Database configuration for Bheem Academy
Handles connections to both Moodle DB and ERP DB
"""
from sqlalchemy import create_engine
from sqlalchemy.ext.declarative import declarative_base
from sqlalchemy.orm import sessionmaker
from sqlalchemy.pool import NullPool
import os
from dotenv import load_dotenv

load_dotenv()

# Moodle Database (Learning Data)
MOODLE_DATABASE_URL = os.getenv(
    "MOODLE_DATABASE_URL",
    "postgresql://postgres:Bheem924924.%40@65.109.167.218:5432/bheem_academy_staging"
)

# ERP Database (User Management)
ERP_DATABASE_URL = os.getenv(
    "ERP_DATABASE_URL",
    "postgresql://postgres:Bheem924924.%40@65.109.167.218:5432/erp_staging"
)

# Create engines
moodle_engine = create_engine(
    MOODLE_DATABASE_URL,
    poolclass=NullPool,
    echo=False
)

erp_engine = create_engine(
    ERP_DATABASE_URL,
    poolclass=NullPool,
    echo=False
)

# Create session makers
MoodleSessionLocal = sessionmaker(autocommit=False, autoflush=False, bind=moodle_engine)
ERPSessionLocal = sessionmaker(autocommit=False, autoflush=False, bind=erp_engine)

# Create base classes
MoodleBase = declarative_base()
ERPBase = declarative_base()


# Dependency for Moodle DB
def get_moodle_db():
    """Get Moodle database session"""
    db = MoodleSessionLocal()
    try:
        yield db
    finally:
        db.close()


# Dependency for ERP DB
def get_erp_db():
    """Get ERP database session"""
    db = ERPSessionLocal()
    try:
        yield db
    finally:
        db.close()

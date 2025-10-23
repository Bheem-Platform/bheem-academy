"""
Bheem Academy Backend API
FastAPI application for Bheem Academy learning management system
"""
from fastapi import FastAPI
from fastapi.middleware.cors import CORSMiddleware
from fastapi.middleware.gzip import GZipMiddleware
import os
from dotenv import load_dotenv

# Load environment variables
load_dotenv()

# Create FastAPI app
app = FastAPI(
    title="Bheem Academy API",
    description="Complete Learning Management System API integrated with Bheem Platform",
    version="1.0.0",
    docs_url="/docs",
    redoc_url="/redoc"
)

# CORS Configuration
CORS_ORIGINS = os.getenv("CORS_ORIGINS", "").split(",")
app.add_middleware(
    CORSMiddleware,
    allow_origins=CORS_ORIGINS if CORS_ORIGINS != [''] else ["*"],
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)

# GZip Compression
app.add_middleware(GZipMiddleware, minimum_size=1000)

# Import routers
from api import auth, courses, blog, assignments, dashboard, badges, course_index

# Register routers
PREFIX = "/api/v1/academy"

app.include_router(auth.router, prefix=f"{PREFIX}/auth", tags=["Authentication"])
app.include_router(courses.router, prefix=f"{PREFIX}/courses", tags=["Courses"])
app.include_router(blog.router, prefix=f"{PREFIX}/blog", tags=["Blog"])
app.include_router(assignments.router, prefix=f"{PREFIX}/assignments", tags=["Assignments"])
app.include_router(dashboard.router, prefix=f"{PREFIX}/dashboard", tags=["Dashboard"])
app.include_router(badges.router, prefix=f"{PREFIX}/badges", tags=["Badges"])
app.include_router(course_index.router, prefix=f"{PREFIX}/course-index", tags=["Courses"])

# TODO: Implement remaining routers
# app.include_router(quizzes.router, prefix=f"{PREFIX}/quizzes", tags=["Quizzes"])
# app.include_router(forums.router, prefix=f"{PREFIX}/forums", tags=["Forums"])
# app.include_router(grades.router, prefix=f"{PREFIX}/grades", tags=["Grades"])
# app.include_router(calendar.router, prefix=f"{PREFIX}/calendar", tags=["Calendar"])
# app.include_router(profile.router, prefix=f"{PREFIX}/profile", tags=["Profile"])


@app.get("/")
async def root():
    """Root endpoint"""
    return {
        "message": "Bheem Academy API",
        "version": "1.0.0",
        "docs": "/docs",
        "health": "/health"
    }


@app.get("/health")
async def health():
    """Health check endpoint"""
    return {
        "status": "healthy",
        "service": "bheem-academy",
        "version": "1.0.0"
    }


if __name__ == "__main__":
    import uvicorn

    PORT = int(os.getenv("PORT", 8085))
    HOST = os.getenv("HOST", "0.0.0.0")

    uvicorn.run(
        "main:app",
        host=HOST,
        port=PORT,
        reload=True,
        log_level="info"
    )

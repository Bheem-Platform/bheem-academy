# 🎓 Bheem Academy - Platform Integration Summary

**Created**: October 22, 2025
**Status**: Company Registered ✅ | Development In Progress 🚧

---

## 📊 Company Registration

### ERP Database: erp_staging
```
Company ID:        cafe17e8-72a3-438b-951e-7af25af4bab8
Company Code:      BHM008
Company Name:      BHEEM ACADEMY
Legal Name:        Bheem Academy - Online Learning Management Platform
Type:              SUBSIDIARY
Parent Company:    79f70aef-17eb-48a8-b599-2879721e8796 (BHM001 - BHEEMVERSE)
Status:            Active ✅
Created:           2025-10-22
```

---

## 🏗️ Architecture

### Platform Integration

```
┌─────────────────────────────────────────────────┐
│  Bheem Academy Frontend                         │
│  Domain: newdesign.bheem.cloud                  │
│  Tech: Vue.js 3 CDN                             │
│  Port: 3400 (local dev)                         │
└─────────────────┬───────────────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────────────┐
│  Bheem Academy Backend API                      │
│  Tech: FastAPI + SQLAlchemy                     │
│  Port: 8030                                     │
│  Base URL: /api/v1/academy                      │
└─────┬───────────────────────────────────────────┘
      │
      ├──► Bheem Passport (Authentication)
      │    URL: https://platform.bheem.co.uk/api/v1/auth
      │    - User Registration
      │    - User Login (JWT)
      │    - Token Validation
      │    - User Profile
      │
      ├──► ERP Database (User Management)
      │    Host: 65.109.167.218:5432
      │    Database: erp_staging
      │    Tables:
      │    - auth.users (credentials, roles)
      │    - public.persons (profiles)
      │    - public.companies (Academy = BHM008)
      │
      └──► Moodle Database (Learning Data)
           Host: 65.109.167.218:5432
           Database: bheem_academy_staging
           Tables:
           - mdl_course (courses)
           - mdl_user_enrolments (enrollments)
           - mdl_post (blog posts)
           - mdl_badge (achievements)
           - mdl_forum (discussions)
```

---

## 🔐 Authentication Flow

### User Registration
1. User fills registration form on newdesign.bheem.cloud
2. Frontend calls `POST /api/v1/academy/auth/register`
3. Academy backend calls Bheem Passport API
4. Passport creates:
   - `auth.users` record with `company_id = cafe17e8-72a3-438b-951e-7af25af4bab8`
   - `public.persons` record with user details
5. Returns JWT access_token + refresh_token
6. User is logged in automatically

### User Login
1. User enters username/password
2. Frontend calls `POST /api/v1/academy/auth/login`
3. Academy backend calls Bheem Passport API
4. Passport validates credentials against ERP database
5. Returns JWT tokens
6. Frontend stores tokens in localStorage/cookies

### Protected Endpoints
```python
from platform_auth_client import get_platform_auth_client

async def get_current_user(token: str = Depends(oauth2_scheme)):
    auth_client = get_platform_auth_client()
    user = await auth_client.get_current_user(token)
    # Returns: {id, username, email, role, company_id, person_id}
    return user

@router.get("/dashboard/my")
async def get_my_dashboard(user = Depends(get_current_user)):
    # User is authenticated via Bheem Passport
    # Query Moodle DB for user's courses, progress, etc.
    pass
```

---

## 📁 Project Structure

```
/root/bheem-academy/
├── backend/
│   ├── main.py                          # FastAPI application
│   ├── platform_auth_client.py          # Bheem Passport integration
│   ├── platform_credits_client.py       # Optional: Credits system
│   ├── requirements.txt                 # Python dependencies
│   ├── .env                             # Environment variables
│   │
│   ├── core/
│   │   ├── database_moodle.py           # Moodle DB connection
│   │   ├── database_erp.py              # ERP DB connection
│   │   └── config.py                    # Settings
│   │
│   ├── api/
│   │   ├── auth.py                      # Login, Register, Me
│   │   ├── blog.py                      # Blog CRUD
│   │   ├── courses.py                   # Course listing, enrollment
│   │   ├── dashboard.py                 # User dashboard
│   │   ├── badges.py                    # Achievements
│   │   ├── profile.py                   # User profile
│   │   └── forums.py                    # Discussion forums
│   │
│   ├── models/
│   │   ├── moodle.py                    # SQLAlchemy models
│   │   └── erp.py                       # ERP models
│   │
│   ├── schemas/
│   │   ├── auth.py                      # Pydantic schemas
│   │   ├── blog.py
│   │   ├── course.py
│   │   └── user.py
│   │
│   └── services/
│       ├── blog_service.py              # Business logic
│       ├── course_service.py
│       └── dashboard_service.py
│
├── frontend/
│   ├── blog/
│   │   ├── list.html                    # Blog listing
│   │   └── detail.html                  # Blog post detail
│   ├── dashboard/
│   │   └── index.html                   # User dashboard
│   ├── courses/
│   │   ├── list.html                    # Course catalog
│   │   └── detail.html                  # Course page
│   ├── profile/
│   │   └── index.html                   # User profile
│   └── badges/
│       └── list.html                    # Badges/achievements
│
├── docs/
│   ├── API_DOCUMENTATION.md
│   └── DEPLOYMENT_GUIDE.md
│
├── README.md
└── docker-compose.yml
```

---

## 🔧 Configuration

### Environment Variables (.env)

```env
# Bheem Platform Integration
BHEEM_PASSPORT_URL=https://platform.bheem.co.uk
BHEEM_COMPANY_CODE=BHM008
BHEEM_CREDITS_URL=https://platform.bheem.co.uk/api/v1/credits

# ERP Database (User Management)
ERP_DATABASE_URL=postgresql://postgres:Bheem924924.@65.109.167.218:5432/erp_staging

# Moodle Database (Learning Data)
MOODLE_DATABASE_URL=postgresql://postgres:Bheem924924.@65.109.167.218:5432/bheem_academy_staging

# API Settings
API_VERSION=v1
API_PREFIX=/api/v1/academy
PORT=8030
HOST=0.0.0.0

# CORS
CORS_ORIGINS=https://newdesign.bheem.cloud,https://academy.bheem.cloud,http://localhost:3400,http://localhost:8030

# JWT (managed by Passport)
JWT_SECRET_KEY=<managed-by-passport>
JWT_ALGORITHM=HS256
JWT_EXPIRY_HOURS=24

# Logging
LOG_LEVEL=INFO
```

---

## 🗄️ Database Schema

### ERP Database (erp_staging)

**auth.users** - User Authentication
```sql
id              UUID PRIMARY KEY
username        VARCHAR(100) UNIQUE
hashed_password VARCHAR(255)
role            VARCHAR(20)  -- ADMIN, MANAGER, USER, VIEWER
is_active       BOOLEAN DEFAULT TRUE
person_id       UUID REFERENCES public.persons(id)
company_id      UUID  -- cafe17e8-72a3-438b-951e-7af25af4bab8 (BHM008)
is_banned       BOOLEAN DEFAULT FALSE
token_version   INTEGER DEFAULT 0
created_at      TIMESTAMP
updated_at      TIMESTAMP
```

**public.persons** - User Profiles
```sql
id               UUID PRIMARY KEY
person_type      VARCHAR(50)  -- EMPLOYEE, CUSTOMER, VENDOR
first_name       VARCHAR(100)
middle_name      VARCHAR(100)
last_name        VARCHAR(100)
preferred_name   VARCHAR(100)
date_of_birth    DATE
gender           VARCHAR(30)
nationality      VARCHAR(100)
profile_photo_url VARCHAR(500)
is_active        BOOLEAN DEFAULT TRUE
```

**public.companies** - Company Registry
```sql
id              UUID PRIMARY KEY
company_code    VARCHAR(20) UNIQUE  -- BHM008
company_name    VARCHAR(200)        -- BHEEM ACADEMY
company_type    VARCHAR(20)         -- SUBSIDIARY
parent_company_id UUID              -- BHM001
is_active       BOOLEAN DEFAULT TRUE
```

### Moodle Database (bheem_academy_staging)

All existing Moodle tables remain unchanged:
- mdl_user (29 users)
- mdl_course (19 courses)
- mdl_user_enrolments (52 enrollments)
- mdl_post (blog posts)
- mdl_badge (badges)
- mdl_forum (forums)
- mdl_quiz (quizzes)
- mdl_assign (assignments)

**User Linking**: ERP `auth.users.id` = Moodle `mdl_user.id`

---

## 📡 API Endpoints

### Authentication (via Bheem Passport)
```
POST   /api/v1/academy/auth/register     # Register new user
POST   /api/v1/academy/auth/login        # Login user
GET    /api/v1/academy/auth/me           # Get current user
POST   /api/v1/academy/auth/logout       # Logout
POST   /api/v1/academy/auth/refresh      # Refresh token
```

### Blog
```
GET    /api/v1/academy/blog/posts        # List posts (pagination, search)
GET    /api/v1/academy/blog/posts/{id}   # Get single post
POST   /api/v1/academy/blog/posts        # Create post (auth required)
PUT    /api/v1/academy/blog/posts/{id}   # Update post (auth required)
DELETE /api/v1/academy/blog/posts/{id}   # Delete post (auth required)
```

### Dashboard
```
GET    /api/v1/academy/dashboard/my      # My dashboard data
GET    /api/v1/academy/dashboard/student/{id}  # For mentors/parents
```

### Courses
```
GET    /api/v1/academy/courses           # List courses
GET    /api/v1/academy/courses/{id}      # Get course details
POST   /api/v1/academy/courses/{id}/enroll  # Enroll in course
GET    /api/v1/academy/courses/my        # My enrolled courses
```

### Profile
```
GET    /api/v1/academy/profile/me        # Get my profile
PUT    /api/v1/academy/profile/me        # Update profile
GET    /api/v1/academy/profile/{id}      # Get user profile
```

### Badges
```
GET    /api/v1/academy/badges            # List all badges
GET    /api/v1/academy/badges/my         # My earned badges
GET    /api/v1/academy/badges/{id}       # Badge details
```

### Forums
```
GET    /api/v1/academy/forums            # List forums
GET    /api/v1/academy/forums/{id}       # Forum details
POST   /api/v1/academy/forums/{id}/posts # Create post
GET    /api/v1/academy/forums/{id}/posts # List posts
```

---

## 🚀 Deployment

### Local Development

```bash
# Backend
cd /root/bheem-academy/backend
pip install -r requirements.txt
uvicorn main:app --host 0.0.0.0 --port 8030 --reload

# Frontend (static files)
# Deploy to newdesign.bheem.cloud/academy/
```

### Production (Bheem Cloud)

```bash
# Build Docker image
docker build -t bheem-academy-backend:latest .

# Run container
docker run -d \
  --name bheem-academy-backend \
  -p 8030:8030 \
  --env-file .env \
  bheem-academy-backend:latest

# Frontend: Deploy to /home/academy/academy/public/ on newdesign.bheem.cloud
```

### Push to Platform Git

```bash
# Copy to platform repository
scp -i /root/.ssh/sundeep -r /root/bheem-academy/* \
  root@socialselling.ai:/root/bheem-platform/modules/bheem-academy/

# Commit to git
ssh -i /root/.ssh/sundeep root@socialselling.ai
cd /root/bheem-platform
git add modules/bheem-academy/
git commit -m "Add Bheem Academy module with platform integration"
git push origin main
```

---

## ✅ Integration Checklist

- [x] Create Academy company in ERP (BHM008) ✅
- [x] Design module structure ✅
- [ ] Copy platform_auth_client.py from socialselling module
- [ ] Create backend configuration files
- [ ] Build SQLAlchemy models for Moodle tables
- [ ] Implement authentication endpoints
- [ ] Implement blog API endpoints
- [ ] Implement dashboard API endpoint
- [ ] Implement courses API endpoints
- [ ] Implement profile API endpoints
- [ ] Implement badges API endpoints
- [ ] Copy Vue.js frontends from dev.bheem.cloud
- [ ] Update frontend API URLs
- [ ] Test authentication flow
- [ ] Test all API endpoints
- [ ] Deploy backend to production
- [ ] Deploy frontend to newdesign.bheem.cloud
- [ ] Push to bheem-platform git repository

---

## 📝 Notes

1. **Single Sign-On**: Users can use same credentials across all Bheem modules
2. **No Moodle Dependency**: Academy backend is standalone FastAPI, no PHP/Moodle functions
3. **Two Databases**: ERP for users, Moodle DB for learning content
4. **Platform Standards**: Follows same patterns as SocialSelling, Community, Marketplace
5. **Credit System**: Can integrate Bheem Credits for paid courses (optional)
6. **Multi-Tenant**: Academy is one company under Bheemverse umbrella

---

## 🔗 Related Documentation

- [Bheem Passport Integration Guide](/root/BHEEM_PASSPORT_INTEGRATION_GUIDE.md)
- [Academy Backend API Requirements](/root/bheem-cloud/ACADEMY_BACKEND_API_REQUIREMENTS.md)
- [Platform Deployment Status](/root/bheem-platform/DEPLOYMENT_STATUS.md)

---

**Next Step**: Build backend structure and copy platform_auth_client.py

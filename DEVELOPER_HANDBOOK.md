# Bheem Academy - Developer Handbook

**Last Updated:** October 23, 2025
**Server:** 157.180.84.127 (Academy-Portal)
**Main Domain:** https://newdesign.bheem.cloud

---

## 📋 Table of Contents

1. [Project Overview](#project-overview)
2. [Server Architecture](#server-architecture)
3. [Directory Structure](#directory-structure)
4. [Services & Ports](#services--ports)
5. [Development Environment](#development-environment)
6. [Database Configuration](#database-configuration)
7. [Deployment & Services](#deployment--services)
8. [Important File Locations](#important-file-locations)
9. [Copying Files from Staging](#copying-files-from-staging)
10. [Common Tasks](#common-tasks)
11. [Troubleshooting](#troubleshooting)
12. [Production Migration Path](#production-migration-path)

---

## 🎯 Project Overview

**Bheem Academy** is a new learning management system built with:
- **Frontend:** PHP 8.1 (legacy Moodle pages being migrated)
- **Backend:** FastAPI (Python 3.10)
- **Database:** PostgreSQL (remote server)
- **Server:** Nginx + PHP-FPM

### Project Goals
- Replace legacy Moodle with modern FastAPI backend
- Keep same frontend design and user experience
- Independent, scalable architecture
- Eventually replace production academy.bheem.cloud

---

## 🖥️ Server Architecture

### Server: 157.180.84.127 (Academy-Portal)

**Three Systems Running Independently:**

| System | Domain | Port | Purpose | Status |
|--------|--------|------|---------|--------|
| **Production Moodle** | academy.bheem.cloud | 8081 | Live production LMS | ⚠️ DO NOT TOUCH |
| **Staging Moodle** | dev.bheem.cloud | 8082 | Reference/backup | 📚 READ ONLY |
| **New Academy** | newdesign.bheem.cloud | 8085 | **Active Development** | ✅ MAIN PROJECT |
| **Code-Server IDE** | ide.bheem.cloud:8889 | 8889 | Development IDE | 🔧 DEV TOOL |

---

## 📁 Directory Structure

### Main Project Directory: `/opt/bitnami/academy/`

```
/opt/bitnami/academy/
├── public/                          # PHP Frontend (280MB)
│   ├── index.php                   # Homepage
│   ├── course/                     # Course pages
│   │   ├── index.php              # Course catalog (FastAPI proxy)
│   │   ├── view.php               # Course detail page
│   │   └── edoo-components/       # Reusable components
│   │       └── footer/            # Footer component
│   ├── blog/                       # Blog section
│   │   ├── list.php               # Blog listing
│   │   ├── detail.php             # Blog post detail
│   │   └── api/                   # Blog API endpoints
│   │       ├── get_list.php       # Blog list API
│   │       └── get_entry.php      # Blog detail API
│   ├── admin-login.php            # Admin login (standalone)
│   ├── includes/                   # Shared includes
│   │   └── bheem_header.php       # Navigation header
│   ├── bheem-components/          # UI components
│   ├── api/                        # API proxy endpoints
│   └── config.php                  # Database config
│
├── backend/                         # FastAPI Backend (138MB)
│   ├── main.py                     # FastAPI application entry
│   ├── api/                        # API routes
│   │   ├── __init__.py
│   │   ├── auth.py                # Authentication
│   │   ├── courses.py             # Course endpoints
│   │   ├── course_index.py        # Course index HTML
│   │   ├── blog.py                # Blog endpoints
│   │   ├── assignments.py         # Assignment endpoints
│   │   ├── dashboard.py           # Dashboard endpoints
│   │   └── badges.py              # Badge endpoints
│   ├── core/                       # Core modules
│   │   ├── database.py            # Database connections
│   │   └── __init__.py
│   ├── models/                     # Database models
│   │   ├── moodle_models.py       # Moodle schema models
│   │   └── erp_models.py          # ERP schema models
│   ├── schemas/                    # Pydantic schemas
│   │   ├── course.py
│   │   ├── blog.py
│   │   ├── auth.py
│   │   └── ...
│   ├── services/                   # Business logic
│   ├── venv/                       # Python virtual environment
│   ├── requirements.txt            # Python dependencies
│   ├── platform_auth_client.py    # Bheem Platform auth
│   └── .env                        # Environment variables
│
├── DEVELOPER_HANDBOOK.md           # This file
└── README.md                        # Project overview

```

### Reference Directories (DO NOT MODIFY)

```
/opt/bitnami/
├── moodle-production/              # Production Moodle (Docker volume)
│   └── [Port 8081 - academy.bheem.cloud]
│
├── moodle-staging/                 # Staging Moodle (Docker volume)
│   └── [Port 8082 - dev.bheem.cloud]
│   └── ⚠️ Symlink to: /var/lib/docker/volumes/moodle-staging_moodle_data/_data
│
└── Academy/                         # Old project (can be archived)
```

---

## 🔌 Services & Ports

### Port Allocation

| Port | Service | Access | Purpose |
|------|---------|--------|---------|
| **80** | Nginx HTTP | External | HTTP → HTTPS redirect |
| **443** | Nginx HTTPS | External | Main web server |
| **8081** | Moodle Production | Internal | Docker container (production) |
| **8082** | Moodle Staging | Internal | Docker container (reference) |
| **8085** | FastAPI Backend | Internal | Academy API server |
| **8443** | Nginx HTTPS | External | Code-server IDE |
| **8889** | Code-Server | Internal | IDE backend |

---

## 💻 Development Environment

### IDE Access

**URL:** https://ide.bheem.cloud:8443/
**Password:** `AgentBheem2025!`
**Default Folder:** `/opt/bitnami/academy/`

### SSH Access

```bash
# From your local machine
ssh -i /path/to/sundeep root@157.180.84.127
```

### File Permissions

```bash
# Main project owned by www-data
chown -R www-data:www-data /opt/bitnami/academy/

# After editing via SSH as root
chown -R www-data:www-data /opt/bitnami/academy/public/
chown -R www-data:www-data /opt/bitnami/academy/backend/
```

---

## 🗄️ Database Configuration

### PostgreSQL Server

**Location:** 65.109.167.218:5432
**Database:** `bheem_academy_staging`
**Username:** `postgres`
**Password:** `Bheem924924.@`

### Connection String

```bash
postgresql://postgres:Bheem924924.@65.109.167.218:5432/bheem_academy_staging
```

### Direct Database Access

```bash
# Connect to PostgreSQL
PGPASSWORD='Bheem924924.@' psql -h 65.109.167.218 -U postgres -d bheem_academy_staging

# Example queries
SELECT COUNT(*) FROM mdl_course WHERE visible = 1;
SELECT id, name FROM mdl_course_categories ORDER BY sortorder;
```

---

## 📋 Copying Files from Staging

### When You Need Reference Files

**Staging Moodle Location:** `/opt/bitnami/moodle-staging/`

### Copy Specific Files

```bash
# Copy a single file
cp /opt/bitnami/moodle-staging/path/to/file.php /opt/bitnami/academy/public/path/to/

# Copy entire directory
cp -r /opt/bitnami/moodle-staging/course/modules/ /opt/bitnami/academy/public/course/

# Fix permissions after copying
chown -R www-data:www-data /opt/bitnami/academy/public/
```

### Common Files to Reference

- `/opt/bitnami/moodle-staging/course/` - Course pages
- `/opt/bitnami/moodle-staging/admin/` - Admin pages
- `/opt/bitnami/moodle-staging/theme/bheem/` - Theme files
- `/opt/bitnami/moodle-staging/bheem-components/` - Components
- `/opt/bitnami/moodle-staging/includes/` - Includes

---

## 🛠️ Common Tasks

### Restart Services

```bash
# Restart backend
systemctl restart academy-backend

# Reload nginx
systemctl reload nginx

# Restart code-server
systemctl restart code-server
```

### View Logs

```bash
# FastAPI backend logs
journalctl -u academy-backend -f

# Nginx access logs
tail -f /var/log/nginx/newdesign.bheem.cloud.access.log

# Nginx error logs
tail -f /var/log/nginx/newdesign.bheem.cloud.error.log
```

---

## 🤖 For AI Agents (Claude, GPT, etc.)

### Critical Information for Future Sessions

**DO NOT modify:**
- `/opt/bitnami/moodle-production/` - Production (Port 8081)
- `academy.bheem.cloud` - Live production site

**Main working directory:**
- `/opt/bitnami/academy/` - Active development

**Reference (read-only):**
- `/opt/bitnami/moodle-staging/` - Copy files from here if needed

**Quick commands:**

```bash
# Restart backend
systemctl restart academy-backend

# View logs
journalctl -u academy-backend -f

# Copy from staging
cp -r /opt/bitnami/moodle-staging/source /opt/bitnami/academy/dest
chown -R www-data:www-data /opt/bitnami/academy/

# Database
PGPASSWORD='Bheem924924.@' psql -h 65.109.167.218 -U postgres -d bheem_academy_staging
```

---

END OF HANDBOOK

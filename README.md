# Bheem Academy - Modern Learning Management System

**Live Site:** https://newdesign.bheem.cloud/
**Server:** 157.180.84.127 (Academy-Portal)
**Last Updated:** October 23, 2025

---

## 🚀 Quick Start

### For Developers

1. **Access IDE:**
   - URL: https://ide.bheem.cloud:8443/
   - Password: `AgentBheem2025!`
   - Default folder: `/opt/bitnami/academy/`

2. **Read the Handbook:**
   - **📖 [DEVELOPER_HANDBOOK.md](./DEVELOPER_HANDBOOK.md)** - Complete documentation

3. **SSH Access:**
   ```bash
   ssh -i ~/.ssh/sundeep root@157.180.84.127
   cd /opt/bitnami/academy
   ```

---

## 📁 Project Structure

```
/opt/bitnami/academy/
├── public/          # PHP Frontend (280MB)
├── backend/         # FastAPI Backend (138MB)
├── DEVELOPER_HANDBOOK.md   # ⭐ READ THIS FIRST
└── README.md        # This file
```

---

## 🔗 Important Links

- **Main Site:** https://newdesign.bheem.cloud/
- **API Docs:** https://newdesign.bheem.cloud/api/v1/academy/docs
- **IDE:** https://ide.bheem.cloud:8443/
- **Staging Reference:** dev.bheem.cloud (read-only)

---

## ⚙️ Quick Commands

```bash
# Restart backend
systemctl restart academy-backend

# View backend logs
journalctl -u academy-backend -f

# Copy file from staging (if missing)
cp /opt/bitnami/moodle-staging/path/to/file /opt/bitnami/academy/public/path/to/
chown -R www-data:www-data /opt/bitnami/academy/

# Database access
PGPASSWORD='Bheem924924.@' psql -h 65.109.167.218 -U postgres -d bheem_academy_staging
```

---

## 🗄️ Database

**Host:** 65.109.167.218:5432
**Database:** bheem_academy_staging
**User:** postgres
**Password:** Bheem924924.@

---

## 📋 Reference Files Location

**Staging Moodle (Read-Only):** `/opt/bitnami/moodle-staging/`

If you need any working files that are missing, copy them from staging:

```bash
# Example: Copy missing component
cp -r /opt/bitnami/moodle-staging/bheem-components/navbar/ \
      /opt/bitnami/academy/public/bheem-components/
chown -R www-data:www-data /opt/bitnami/academy/public/
```

---

## ⚠️ DO NOT TOUCH

- **Production Moodle:** `/opt/bitnami/moodle-production/` (Port 8081)
- **Domain:** academy.bheem.cloud - Live production

---

## 📖 Full Documentation

**👉 See [DEVELOPER_HANDBOOK.md](./DEVELOPER_HANDBOOK.md)**

---

## 🛠️ Technology Stack

- **Backend:** FastAPI (Python 3.10)
- **Frontend:** PHP 8.1
- **Database:** PostgreSQL 14
- **Web Server:** Nginx
- **IDE:** Code-Server (VS Code in browser)

---

**Happy Coding! 🚀**

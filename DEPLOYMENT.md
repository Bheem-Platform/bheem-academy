# Academy Deployment Guide

## Quick Deploy to Bheem Cloud PaaS

### Method 1: Via Git Repository

1. **Initialize Git Repository:**
```bash
cd /root/bheem-academy
git init
git add .
git commit -m "Initial Academy commit with backend + frontend"
```

2. **Add Remote (if using external Git):**
```bash
git remote add origin https://github.com/yourusername/bheem-academy.git
git push -u origin main
```

3. **Deploy via Bheem Cloud API:**
```bash
curl -X POST https://api.bheem.cloud/api/v1/v11/deploy \
  -H "Authorization: Bearer YOUR_TOKEN" \
  -H "Content-Type: application/json" \
  -d '{
    "name": "academy-api",
    "deployment_type": "git",
    "git_url": "https://github.com/yourusername/bheem-academy.git",
    "git_branch": "main",
    "subdomain": "academy-api",
    "environment_variables": {
      "BHEEM_PASSPORT_URL": "https://platform.bheem.co.uk",
      "BHEEM_COMPANY_CODE": "BHM008",
      "ERP_DATABASE_URL": "postgresql://postgres:Bheem924924.@65.109.167.218:5432/erp_staging",
      "MOODLE_DATABASE_URL": "postgresql://postgres:Bheem924924.@65.109.167.218:5432/bheem_academy_staging",
      "CORS_ORIGINS": "https://newdesign.bheem.cloud,https://academy.bheem.cloud"
    }
  }'
```

### Method 2: Direct to App Server

1. **SSH to app server:**
```bash
ssh -i /root/.ssh/sundeep root@65.108.12.171
```

2. **Clone or copy to server:**
```bash
cd /home/academy
git clone <repo-url> academy-backend
# OR
# scp -r /root/bheem-academy root@65.108.12.171:/home/academy/academy-backend
```

3. **Install dependencies:**
```bash
cd /home/academy/academy-backend/backend
python3 -m venv venv
source venv/bin/activate
pip install -r requirements.txt
```

4. **Run with systemd:**
Create `/etc/systemd/system/academy-backend.service`:
```ini
[Unit]
Description=Academy Backend API
After=network.target

[Service]
Type=simple
User=academy
WorkingDirectory=/home/academy/academy-backend/backend
Environment="PATH=/home/academy/academy-backend/backend/venv/bin"
Environment="BHEEM_PASSPORT_URL=https://platform.bheem.co.uk"
Environment="BHEEM_COMPANY_CODE=BHM008"
Environment="ERP_DATABASE_URL=postgresql://postgres:Bheem924924.@65.109.167.218:5432/erp_staging"
Environment="MOODLE_DATABASE_URL=postgresql://postgres:Bheem924924.@65.109.167.218:5432/bheem_academy_staging"
ExecStart=/home/academy/academy-backend/backend/venv/bin/uvicorn main:app --host 0.0.0.0 --port 8082 --workers 2
Restart=always

[Install]
WantedBy=multi-user.target
```

5. **Start service:**
```bash
systemctl daemon-reload
systemctl enable academy-backend
systemctl start academy-backend
```

6. **Update nginx to proxy API requests:**
```nginx
# Add to /etc/nginx/sites-enabled/academy

location /api/v1/academy {
    proxy_pass http://localhost:8082;
    proxy_set_header Host $host;
    proxy_set_header X-Real-IP $remote_addr;
    proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;
    proxy_set_header X-Forwarded-Proto $scheme;
}
```

7. **Reload nginx:**
```bash
nginx -t && systemctl reload nginx
```

## Environment Variables

Required:
- `BHEEM_PASSPORT_URL` - https://platform.bheem.co.uk
- `BHEEM_COMPANY_CODE` - BHM008
- `ERP_DATABASE_URL` - postgresql://...
- `MOODLE_DATABASE_URL` - postgresql://...
- `CORS_ORIGINS` - Comma-separated allowed origins

Optional:
- `PORT` - Default 8030 (will be set by PaaS)
- `HOST` - Default 0.0.0.0

## Post-Deployment

1. **Test API:**
```bash
curl https://newdesign.bheem.cloud/api/v1/academy/health
```

2. **Test authentication:**
```bash
curl -X POST https://newdesign.bheem.cloud/api/v1/academy/auth/login \
  -H "Content-Type: application/json" \
  -d '{"username": "testuser", "password": "password"}'
```

3. **Access Swagger docs:**
```
https://newdesign.bheem.cloud/api/v1/academy/docs
```

## Folder Structure on Server

```
/home/academy/
├── academy/                  # Old PHP frontend (port 8081)
└── academy-backend/          # New FastAPI backend (port 8082)
    ├── backend/             # Python API
    │   ├── api/
    │   ├── main.py
    │   └── venv/
    └── frontend/            # Static files (served by nginx)
```

## Nginx Final Configuration

```nginx
server {
    listen 8081;
    server_name _;

    root /home/academy/academy/public;
    index index.php index.html;

    # Frontend static files
    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    # API Backend
    location /api/v1/academy {
        proxy_pass http://localhost:8082;
        proxy_set_header Host $host;
        proxy_set_header X-Real-IP $remote_addr;
        proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;
        proxy_set_header X-Forwarded-Proto $scheme;
    }

    # PHP handler for old frontend
    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
    }
}
```

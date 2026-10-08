# Admin Panel Guide

HTML + PHP + Bootstrap (green theme). MySQL on Railway. Scan model stays on Modal.

## File structure

```
admin-panel/
├── index.php                  goes to the login page
├── database.sql               tables (run first)
├── library-seed.sql           starter pests/diseases (run second)
├── assets/
│   └── style.css              green theme
├── includes/
│   ├── db.php                 MySQL connection
│   ├── auth.php               login check + form security code
│   ├── header.php             sidebar + page top
│   └── footer.php             page bottom
├── admin/
│   ├── login.php              login page
│   ├── login-check.php        checks username/password
│   ├── logout.php
│   ├── dashboard.php          counts + recent scans
│   ├── create-admin.php       run ONCE, then delete
│   ├── library/               pests + diseases (?type=pest | disease)
│   │   ├── index.php          list
│   │   ├── form.php           add / edit
│   │   ├── save.php           insert / update
│   │   └── delete.php
│   └── users/
│       ├── index.php          user list
│       └── view.php           one user + scans
└── api/                       used by the Flutter app
    ├── library.php            GET  whole library + version
    ├── version.php            GET  version only
    └── scans.php              POST scan result (needs API_KEY)
```

## Code order in every file
CONTAINERS (page structure) → CONTENT (text, fields, buttons) → LOGIC (queries / saving).
Small setup lines (login check, page title) stay at the top because PHP must run them first.

## Railway setup
1. New project → add **MySQL** service, then add this code as a PHP service.
2. PHP service variables: `MYSQLHOST`, `MYSQLPORT`, `MYSQLDATABASE`, `MYSQLUSER`, `MYSQLPASSWORD` (reference them from the MySQL service) and `API_KEY` (any long random text).
3. Run `database.sql`, then `library-seed.sql` in the MySQL console.
4. Open `/admin/create-admin.php` once (login: admin / change-me-123). **Delete that file, then change the password.**

## App (Flutter) side
- `GET /api/version.php` on startup. If the version is higher than the saved one, `GET /api/library.php`, then save the items locally.
- `POST /api/scans.php` with header `X-API-Key` and JSON: `device_id`, `name`, `result`, `confidence`.
- Keep the bundled library in the APK as the first-launch fallback.

## Rules
- Every admin file starts with `require_once ... auth.php`.
- Every save/delete in the library raises `library_meta.version`.
- Delete and save use POST + security code (never a plain link).
- The app never connects to MySQL directly. It only calls `/api`.

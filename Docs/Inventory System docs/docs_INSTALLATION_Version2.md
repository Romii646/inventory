# Installation Guide: Main Inventory System

---

## Prerequisites

- PHP 8.2 or higher
- MariaDB or MySQL 10.4+
- Web server (e.g., Apache, Nginx)
- Composer (for PHP dependencies)
- Node.js/NPM (if using any frontend build tools/scripts)

---

## 1. Clone the Repository

```bash
git clone https://github.com/your-org/inventory-system.git
cd inventory-system
```

---

## 2. Set Up the Database

1. Create a new database (e.g., `inventdev`).
2. Import the schema and sample data:
    ```bash
    mysql -u youruser -p inventdev < sql/schema.sql
    ```
   Or use phpMyAdmin to import the provided `.sql` file.

---

## 3. Configure Environment

- Copy `.env.example` to `.env` (if exists) and update:
    - Database host, name, username, password
    - Any necessary email or external configuration

---

## 4. Install Dependencies

```bash
composer install
```
(If using frontend build tools)
```bash
npm install
npm run build
```

---

## 5. Web Server Configuration

- Point your web server’s document root to the `/public` directory.
- Ensure `mod_rewrite` is enabled for Apache, or configure your Nginx rules as needed.

---

## 6. Set File Permissions

- Ensure the web server can write to `/exports/` for report downloads.

---

## 7. Initial Setup

- Create at least one DBA employee via the provided admin interface or directly in the DB.
- Log in via the web UI and verify all pages load.

---

## 8. Optional: Test Data

- Load additional test/sample data from `/sql/sample_data.sql` if desired.

---

## 9. Access the System

- Open your browser and navigate to the configured URL (e.g., http://localhost or your domain).

---

## Troubleshooting

- Check your PHP, web server, and DB logs for errors.
- Ensure database credentials are correct.
- For further help, see [User Guide](Inventory_System_User_Guide.md) or [Developer Guide](Inventory_System_Developer_Guide.md).

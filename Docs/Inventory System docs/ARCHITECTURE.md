# College Cyber Lab Asset Management System
## Architecture Overview

---

## 1. **High-Level Architecture**

The system uses a classic **multi-tier (n-tier) web application** model, organized into:

- **Presentation Layer:** User interface and client-side logic (HTML, CSS, JavaScript)
- **Application/Logic Layer:** Server-side processing, business logic, and authentication (PHP)
- **Data Layer:** Database and database access logic (MySQL, PHP classes)

---

## 2. **Directory Structure**

```
inventory/
├── css/           # Stylesheets for all pages
├── js/            # Client-side JavaScript for UI logic and AJAX
├── php/           # Server-side scripts, classes, business logic
├── assets/        # Images, icons, downloadable files, etc.
├── LoginPage.html # Main entry/login page
├── (other HTML files, e.g., dashboard.html, assets.html)
```

---

## 3. **Layer Responsibilities**

### Presentation Layer (UI)
- **HTML:** Page structure and forms (login, asset management, admin, etc.)
- **CSS:** Page styling, responsive design.
- **JavaScript:** Form validation, dynamic UI updates, AJAX requests to PHP backend.

### Application/Logic Layer (Backend PHP)
- **Authentication:** Validates users, manages sessions, enforces permissions.
- **Business Logic:** Handles asset CRUD, user roles, audit trails, reservations, etc.
- **API Endpoints:** PHP scripts receive AJAX/form requests, process data, return JSON or render HTML.

### Data Layer
- **Database:** Stores user info, assets, logs, reservations, etc.
- **Database Access Classes:** PHP classes encapsulate all DB queries and updates.

---

## 4. **Component Diagram**

```plaintext
[User Browser]
     |
     v
[HTML/CSS/JS] <---(AJAX)---> [PHP Backend] <---(SQL)---> [MySQL Database]
```

---

## 5. **Typical Flow Example**

1. **User visits login page** (`LoginPage.html`)
2. **User submits login form** (HTML form or via JS/AJAX)
3. **PHP backend** (`php/authenticate.php`) validates credentials, sets session
4. **User accesses dashboard** (HTML + JS fetches asset data via AJAX)
5. **User adds/edits asset** (JS sends AJAX to `php/assets.php`)
6. **PHP backend** updates database, returns result/status as JSON
7. **JS updates UI** accordingly

---

## 6. **Extending the System**

- **New Features:** Add new PHP scripts/classes for new modules, add JS for interactivity, update HTML for new views.
- **New Roles/Permissions:** Update user table, session logic, and PHP permission checks.
- **UI Improvements:** Modify/create CSS and JS files as needed.
- **Database Changes:** Update schema and corresponding PHP data access classes.

---

## 7. **Best Practices**

- **Separation of Concerns:** Keep logic, UI, and data access in their own files/folders.
- **Security:** Always validate user input (server-side!), manage sessions securely, restrict access based on user roles.
- **Maintainability:** Write clear, well-commented code; use modular files.
- **Documentation:** Keep this architecture updated as you evolve the project.

---

## 8. **Sample File Responsibilities**

| File/Folder         | Responsibility                                      |
|---------------------|-----------------------------------------------------|
| css/loginPage.css   | Styles for login page                               |
| js/cyberScript.js   | Handles asset management page interactivity         |
| php/Employees.php   | Employee CRUD, user management                      |
| php/database_ops.php| Database connection and query abstraction           |
| LoginPage.html      | Login form and initial landing page                 |

---

## 9. **(Optional) Technologies Used**

- **Frontend:** HTML5, CSS3, JavaScript (ES6+)
- **Backend:** PHP 7/8
- **Database:** MySQL (or MariaDB)
- **Hosting:** College intranet server or local network

---

**This document is a living reference—update it as your system grows!**
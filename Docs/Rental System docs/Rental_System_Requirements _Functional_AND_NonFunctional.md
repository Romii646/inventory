# Rental System Requirements

**Created by:** Aaron C.  
**Date:** 05/13/2025  
**Updated:** 05/29/2025  

---

## 1. Functional Requirements

### 1.1 Rental Management

- Admin/staff can create a new rental for an available inventory item.
- Each rental is linked to a customer and records both start and expected return dates.
- Admin/staff can view a list of all rentals with status (`active`, `returned`, `overdue`).
- Admin/staff can mark a rental as returned, with the actual return date recorded.
- System prevents double-booking of items (cannot rent items already on rent).
- Rentals can be filtered/searched by status, customer ID, or item ID.

### 1.2 Customer Management

- Admin/staff can add, edit, view, and delete customer records (name, contact).
- Each rental record is associated with a customer for tracking rental history.

### 1.3 Inventory Integration

- Item status automatically updates to "rented" when linked to an active rental.
- Item status reverts to "available" when returned.
- Item status is viewable in both inventory and rental management views.

### 1.4 Data Validation & Business Rules

- All required fields must be populated for rental and customer creation.
- Rental start date must not be after the expected return date.
- System stops invalid rental periods and duplicate rentals.

### 1.5 User Interface

- Responsive, simple forms for creating rentals, returning items, and managing customers.
- List/table view for current and past rentals.

---

## 2. Technical Requirements

### 2.1 Database Schema

#### Tables

**`rentals`**

| Field Name           | Type           | Description                                 |
|----------------------|----------------|---------------------------------------------|
| rental_id            | VARCHAR (PK)   | Unique rental record ID                     |
| object_id            | VARCHAR (FK)   | References inventory item                   |
| customer_id          | VARCHAR (FK)   | References customer                         |
| employee_id          | VARCHAR (FK)   | References employees                        |
| start_date           | DATE           | Rental start date                           |
| expected_return_date | DATE           | Date the item is expected to be returned    |
| actual_return_date   | DATE (NULL)    | Date item was actually returned             |
| status               | ENUM           | ('active', 'returned', 'overdue')           |

**`customers`**

| Field Name   | Type         | Description              |
|--------------|--------------|--------------------------|
| customer_id  | VARCHAR (PK) | Unique customer ID       |
| name         | VARCHAR(100) | Customer's name          |
| contact      | VARCHAR(100) | Email or phone           |
| B#           | VARCHAR(20)  | Unique Student Number    |
| joinDate     | DATE         | When customer registered |

**`items`**

| Field Name | Type         | Description                                 |
|------------|--------------|---------------------------------------------|
| object_id  | VARCHAR (PK) | Unique rental item ID                       |
| item_id    | VARCHAR (FK) | References tech item for rent               |
| category   | ENUM         | ('MiniPC', 'Raspberry Pie', 'Accessories')<br>Other categories can be included at any point. |
| rentPrice  | DECIMAL      | Cost to rent the item                       |

---

### 2.2 Backend Logic

- Rental creation, return, listing, and validation logic implemented in PHP.
- Updates item status on rental/return.
- CRUD endpoints for customer management.
- All user inputs validated and sanitized; use prepared statements for SQL.
- Items cannot be rented if already marked as "rented".

### 2.3 Frontend Logic

- UI forms for rentals and customer management (HTML/JavaScript).
- Table/list views for rentals and customers.
- Filters for rental status, customer, and item.
- Clear error and success messages for all user actions.

### 2.4 Access Control

- Only admin or staff users can manage rentals and customers.
- No self-service or login required for customers.

### 2.5 Non-Functional Requirements

- Code follows OOP, modular design patterns, and MVC architecture.
- Inline code comments and clear documentation.
- Responsive, accessible UI (no advanced frameworks required).
- Secure against SQL injection and common web vulnerabilities via PDO.

### 2.6 Out of Scope

- Payment processing, late fees, or deposits.
- Email/SMS notifications.
- Advanced reporting, analytics, or batch/multi-item rentals.

### 2.7 Logging and Error Handling

- The system automatically creates all required log directories under `logs/` at startup, including:
    - `logs/database/`
    - `logs/rentals/`
    - `logs/customer/`
    - `logs/item/`
    - `logs/security/`
    - `logs/errors/`
    - `logs/session/`
- All session and security-related events are logged to `logs/session/session_operations.log`.
- General errors are logged to `logs/errors/general_errors.log`.
- The logging system ensures that missing directories do not cause runtime errors.
- All log entries include a timestamp, log level, and descriptive message.
- No PHP warnings, notices, or errors should be output to the user or included in API JSON responses; all such issues are logged instead.

### 2.8 Session Management

- User authentication and session management use PHP’s built-in session system.
- Session cookies are set for the entire application path (`/`).
- Session data is set before any HTTP redirect after login.
- Session data is accessed via secure backend endpoints, which return only valid JSON responses.
- Only one `session_start();` call is made per request, at the entry point (`Router.php`).
- All session and authentication events are logged as described above.

---

## 3. Acceptance Criteria

- Rentals can be created, viewed, filtered, and returned by admin/staff.
- Items cannot be double-booked.
- Item and rental statuses update correctly in both inventory and rental views.
- Customers can be fully managed through the UI.
- All user actions provide clear feedback and validation.


# Basic Rental System Requirements (Updated Version)

---

## 1. Functional Requirements

### 1.1 Rental Management
- Admin/staff can create a new rental for an available inventory item.
- Each rental is linked to a customer and records both start and expected return dates.
- Admin/staff can view a list of all rentals with status (active, returned, overdue).
- Admin/staff can mark a rental as returned, with the actual return date recorded.
- System prevents double-booking of items (cannot rent items already on rent).
- Rentals can be filtered/searched by status, customer, or item.

### 1.2 Customer Management
- Admin/staff can add, edit, view, and delete customer records (name, contact).
- Each rental record is associated with a customer for tracking rental history.

### 1.3 Inventory Integration
- Item status automatically updates to "rented" when linked to an active rental.
- Item status reverts to "available" when returned.
- Item status is visible in both inventory and rental management views.

### 1.4 Data Validation & Business Rules
- All required fields must be populated for rental and customer creation.
- Rental start date must not be after the expected return date.
- System prevents invalid rental periods and duplicate rentals for the same item.

### 1.5 User Interface
- Simple, responsive forms for creating rentals, returning items, and managing customers.
- List/table view for current and past rentals with filters.
- User feedback for errors (e.g., unavailable items, missing data) and confirmations.

---

## 2. Technical Requirements

### 2.1 Database Schema

#### Tables

**`rentals`**
| Field Name           | Type          | Description                                 |
|----------------------|---------------|---------------------------------------------|
| rental_id            | INT (PK, AI)  | Unique rental record ID                     |
| item_id              | INT (FK)      | References inventory item                   |
| customer_id          | INT (FK)      | References customer                         |
| start_date           | DATE          | Rental start date                           |
| expected_return_date | DATE          | Date the item is expected to be returned    |
| actual_return_date   | DATE (NULL)   | Date item was actually returned             |
| status               | ENUM          | ('active', 'returned', 'overdue')           |

**`customers`**
| Field Name | Type         | Description             |
|------------|--------------|-------------------------|
| customer_id| INT (PK, AI) | Unique customer ID      |
| name       | VARCHAR(100) | Customer's name         |
| contact    | VARCHAR(100) | Email or phone          |

**`items`** (update if not present)
| Field Name | Type          | Description                 |
|------------|---------------|-----------------------------|
| status     | ENUM          | ('available', 'rented')     |

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

- Code follows OOP and modular design patterns.
- Inline code comments and clear documentation.
- Responsive, accessible UI (no advanced frameworks required).
- Secure against SQL injection and common web vulnerabilities.

### 2.6 Out of Scope

- Payment processing, late fees, or deposits.
- Email/SMS notifications.
- Advanced reporting, analytics, or batch/multi-item rentals.

---

## 3. Acceptance Criteria

- Rentals can be created, viewed, filtered, and returned by admin/staff.
- Items cannot be double-booked.
- Item and rental statuses update correctly in both inventory and rental views.
- Customers can be fully managed through the UI.
- All user actions provide clear feedback and validation.
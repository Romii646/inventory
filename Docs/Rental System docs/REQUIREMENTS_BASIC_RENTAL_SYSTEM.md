# Technical Requirements: Basic Rental System Extension

## Overview

This document outlines the technical requirements for adding a **Basic Rental System** to the existing inventory management application. The goal is to allow authorized users to manage the rental of inventory items to customers or employees, track rental status, and prevent double-booking.

---

## 1. Database Schema Changes

### 1.1 Tables

#### a. `rentals`
| Field Name           | Type          | Description                                 |
|----------------------|---------------|---------------------------------------------|
| rental_id            | INT (PK, AI)  | Unique rental record ID                     |
| item_id              | INT (FK)      | References inventory item                   |
| customer_id          | INT (FK)      | References customer                         |
| start_date           | DATE          | Rental start date                           |
| expected_return_date | DATE          | Date the item is expected to be returned    |
| actual_return_date   | DATE (NULL)   | Date item was actually returned             |
| status               | ENUM          | ('active', 'returned', 'overdue')           |

#### b. `customers`
| Field Name | Type         | Description             |
|------------|--------------|-------------------------|
| customer_id| INT (PK, AI) | Unique customer ID      |
| name       | VARCHAR(100) | Customer's name         |
| contact    | VARCHAR(100) | Email or phone          |

#### c. Update `items` Table
- Add a `status` field (e.g., 'available', 'rented') if not present.

---

## 2. Backend Logic (PHP)

### 2.1 Rental Management

- **Create Rental**
  - Only allow if item status is 'available'
  - Insert new rental record
  - Set item status to 'rented'

- **Return Rental**
  - Mark rental as 'returned', set `actual_return_date`
  - Set item status back to 'available'

- **List Rentals**
  - Retrieve all rentals, filterable by status (active, returned, overdue)
  - Include joins to show item and customer details

- **Basic Validations**
  - Prevent double-booking (cannot rent if already 'rented')
  - Required fields: item, customer, start_date, expected_return_date

### 2.2 Customer Management

- CRUD for customers (add, edit, delete, view)

---

## 3. Frontend Logic (JavaScript/HTML)

- **Rental Form**
  - Select available item
  - Select customer (from dropdown or search)
  - Input start and expected return date
  - Submit rental request

- **Return Form**
  - List active rentals
  - Option to mark as returned

- **Rental Listing**
  - Table view of all rentals with filters for status

- **Feedback/UI**
  - Error messages for unavailable items
  - Confirmations on successful rental/return

---

## 4. Access Control

- Only admin/staff users can manage rentals and customers
- No self-service for customers

---

## 5. Optional Features (For Future)

- Export rental history as CSV
- Simple overdue indicator (based on current date and expected return date)

---

## 6. Non-Functional Requirements

- Code must follow existing project conventions (OOP PHP, modular JS)
- Secure against SQL injection (prepared statements)
- UI must be responsive and simple; no advanced frameworks required
- Clear documentation and inline code comments

---

## 7. Out of Scope

- Payments, late fees, or deposits
- Email/SMS notifications
- Advanced analytics or reporting
- Multi-item batch rentals

---

## 8. Acceptance Criteria

- Users can create, view, and return rentals through the UI
- Items cannot be double-booked
- Rental statuses and item availability update appropriately
- Customers can be created, viewed, edited, and deleted
- All actions validated and user feedback provided

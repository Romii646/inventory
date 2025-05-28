# Created by: Aaron C.
# Date: 05/26/2025

# Use Cases and Non-Use Cases for the Rental System

---

## 1. Use Cases

### Use Case 1: Rent Out an Item
**Actor:** Staff/Admin  
**Description:** Staff logs into the system, selects an available computer or hardware item, chooses a customer, sets the rental and expected return dates, and confirms the rental. The item’s status updates to “rented.”

### Use Case 2: Return an Item
**Actor:** Staff/Admin  
**Description:** Staff views the list of active rentals, selects a rental where the customer is returning the item, marks it as returned, and the system records the actual return date and updates the item’s status to “available.”

### Use Case 3: Prevent Double-Booking
**Actor:** Staff/Admin  
**Description:** Staff attempts to rent an item that is already rented out. The system checks item status and displays an error, preventing double-booking.

### Use Case 4: View Rental History
**Actor:** Staff/Admin  
**Description:** Staff wants to view all past and current rentals. The system provides a filterable list of rentals by status, customer, or item.

### Use Case 5: Manage Customer Information
**Actor:** Staff/Admin  
**Description:** Staff adds, edits, or deletes customer records (name, contact information) before associating them with rentals.

### Use Case 6: Validate Rental Dates
**Actor:** Staff/Admin  
**Description:** During rental creation, the system ensures the start date is not after the expected return date and displays an error if validation fails.

---

## 2. Non-Use Cases (Explicitly Out of Scope)

### Non-Use Case 1: Self-Service Rentals by Customers
The system does not allow customers to log in, view, or initiate rentals themselves. Only staff/admin users perform all rental operations.

### Non-Use Case 2: Payment and Fee Processing
The system does not handle payments, deposits, late fees, or financial transactions of any kind.

### Non-Use Case 3: Batch/Multi-Item Rentals
The system does not support renting multiple items under a single rental transaction; each rental is tied to a single item.

### Non-Use Case 4: Automated Notifications
There are no automated email or SMS reminders for due dates, overdue items, or confirmations.

### Non-Use Case 5: Advanced Reporting or Analytics
The system does not provide dashboards, advanced analytics, or data visualizations beyond a basic filterable rental list.

### Non-Use Case 6: External System Integrations
The system does not integrate with external inventory, accounting, or notification systems.

---
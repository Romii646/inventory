# Created by: Aaron C.
# Date: 05/15/2025

# Detailed Use Cases with Scenarios and Alternatives: Rental System

---

## Use Case 1: Rent Out an Item

**Primary Actor:** Staff/Admin  
**Goal:** Successfully rent an available item to a customer.  
**Preconditions:**  
- The staff/admin is authenticated and has access to the rental system.
- The item exists in inventory and is marked as "available".
- The customer exists in the system.

**Main Scenario (Success Path):**
1. Staff/admin navigates to the "Create Rental" page.
2. Staff selects an item from the list of available items.
3. Staff selects an existing customer or adds a new customer.
4. Staff enters the rental start date and expected return date.
5. Staff submits the rental form.
6. System validates:
    - All required fields are filled.
    - The item is still available.
    - The start date is not after the expected return date.
7. System creates the rental record, updates the item status to "rented".
8. Confirmation is shown: "Rental created successfully."

**Alternative Scenarios:**
- **A1:** Item is no longer available (e.g., just rented by someone else)
    - System displays error: "Selected item is already rented."
    - Staff must choose another item or cancel.
- **A2:** Required fields are missing
    - System highlights missing fields and displays error.
    - Staff corrects and resubmits.
- **A3:** Invalid date range
    - System displays error: "Start date cannot be after expected return date."
    - Staff corrects the dates and resubmits.
- **A4:** Customer does not exist
    - Staff selects "Add New Customer", completes the form, and continues.

---

## Use Case 2: Return an Item

**Primary Actor:** Staff/Admin  
**Goal:** Successfully return a rented item and make it available again.  
**Preconditions:**  
- Rental exists and status is "active".
- Staff/admin is authenticated.

**Main Scenario (Success Path):**
1. Staff accesses the "Active Rentals" list.
2. Staff locates the rental to be returned.
3. Staff clicks "Return" on the rental.
4. System prompts for confirmation and (optionally) actual return date.
5. Staff confirms the return.
6. System updates rental status to "returned", records actual return date, updates item status to "available".
7. Confirmation is shown: "Item returned successfully."

**Alternative Scenarios:**
- **A1:** Rental not found or already returned
    - System shows error: "Rental not found or already returned."
- **A2:** Actual return date before start date
    - System shows error: "Return date cannot be before rental start date."
    - Staff corrects the date.

---

## Use Case 3: Prevent Double-Booking

**Primary Actor:** Staff/Admin  
**Goal:** Prevent the same item from being rented to more than one customer at the same time.

**Main Scenario (Success Path):**
1. Staff attempts to create a new rental for an item.
2. System checks if item status is "available".
3. If available, process continues (see Use Case 1).

**Alternative Scenario:**
- **A1:** Item is "rented"
    - System blocks rental creation and displays error: "Item is already rented out."

---

## Use Case 4: View Rental History

**Primary Actor:** Staff/Admin  
**Goal:** View and filter all rentals by status, customer, or item.

**Main Scenario (Success Path):**
1. Staff navigates to "Rental History" or "All Rentals" page.
2. Staff applies filters (by status, customer, item) as needed.
3. System displays filtered list of rentals with key details.

**Alternative Scenario:**
- **A1:** No rentals found for filters
    - System displays: "No rentals found for selected criteria."

---

## Use Case 5: Manage Customer Information

**Primary Actor:** Staff/Admin  
**Goal:** Add, edit, view, and delete customer records.

**Main Scenario (Success Path):**
1. Staff accesses the "Customers" management page.
2. Staff selects to add, edit, view, or delete a customer.
    - **Add:** Staff completes form, submits, system adds customer.
    - **Edit:** Staff updates info, submits, system saves changes.
    - **View:** System displays customer details and rental history.
    - **Delete:** Staff confirms deletion, system deletes (if no active rentals).
3. Confirmation is shown for successful operation.

**Alternative Scenarios:**
- **A1:** Attempt to delete customer with active rentals
    - System blocks deletion, displays error: "Cannot delete customer with active rentals."
- **A2:** Missing required fields during add/edit
    - System highlights missing fields and requests correction.

---

## Use Case 6: Validate Rental Dates

**Primary Actor:** Staff/Admin  
**Goal:** Ensure rental start and return dates are valid.

**Main Scenario (Success Path):**
1. Staff enters start and expected return dates when creating a rental.
2. System checks that start date is not after expected return date.
3. Process continues if valid.

**Alternative Scenario:**
- **A1:** Invalid date range
    - System displays error: "Start date must not be after expected return date."
    - Staff corrects the dates and resubmits.

---

## Use Case 7: Filter/Export Rentals (Optional)

**Primary Actor:** Staff/Admin  
**Goal:** Filter rentals and export rental history as CSV.

**Main Scenario (Success Path):**
1. Staff filters rentals by desired criteria.
2. Staff clicks "Export" button.
3. System generates and downloads a CSV file of the filtered rentals.

**Alternative Scenario:**
- **A1:** No rentals match filters
    - System disables export button or displays: "No data to export."

---

## Non-Use Cases (Explicitly Out of Scope)

- Customers initiating rentals or logging in.
- Handling payments, deposits, or late fees.
- Automated notifications or reminders.
- Renting multiple items in a single transaction.
- Advanced analytics, dashboards, or integrations with external systems.

---
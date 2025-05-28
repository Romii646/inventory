# User Guide: Main Inventory System

---

## Table of Contents

1. Introduction
2. Getting Started
3. Logging In & Out
4. Employee Management
5. Asset Management
    - Accessories
    - Graphics Cards
    - Keyboards
    - Mice
    - MiniPCs
    - Monitors
    - Motherboards
    - Power Supplies
    - RAM Sticks
    - Storage Components & Slots
6. PC Setup Management
7. Status, Condition, and Location Tracking
8. Storage Management
9. Reporting & Exports
10. Troubleshooting
11. FAQs

---

## 1. Introduction

The Main Inventory System allows technical staff and administrators to track, manage, and report on all computing assets—including composite PC setups, peripherals, and storage components. Access is restricted to authorized employees.

---

## 2. Getting Started

- Your administrator will provide your employee ID and password.
- You must log in to access the system.
- The system is web-based; open your browser and enter the provided URL.

---

## 3. Logging In & Out

### Logging In
1. Navigate to the login page.
2. Enter your employee ID and password.
3. Click "Login".
4. If you forget your password, contact a DBA or administrator.

### Logging Out
- In the top right click "Logout".

---

## 4. Employee Management

> **For Admins/DBAs only**

- To add an employee: Go to myadminPHP and go to "Employees" > "Add Employee", fill in details, and assign a role.
- To edit: Click an employee in the list, update fields, and save.
- To delete: Select employee and click "Delete". Cannot delete employees with active system records.
- Roles:  
    - **DBA**: Full access (manage employees, all assets)
    - **FullTime/SoftwareDev**: Restricted to asset management

---

## 5. Asset Management

Each asset type has its own page for listing, searching, and editing.

### Adding an Asset
1. Go to the asset type (e.g., "Keyboards").
2. Click "Add New".
3. Fill in required fields:
    - ID (unique, e.g., kb_0001)
    - Name
    - Condition (GOOD/BROKEN)
    - Cost
    - Status (IN_USE, STORAGE, etc.)
    - Location
4. Click "Save".

### Editing/Deleting
- Use the asset list, locate item, click "Delete" located in the Delete form.
- You CANNOT delete an asset referenced in a PC setup.

---

## 6. PC Setup Management

- PC Setups are composite entries linking components (e.g., motherboard, GPU, RAM, etc.).
- To create: Go to "PC Setups" > "Add New", select component IDs for each slot, set location and condition, then save.
- To edit: Use the PC Setup list, click on a setup, update components, then save.
- To delete: Only allowed if not in use or assigned.

---

## 7. Status, Condition, and Location Tracking

- Update status (IN_USE, STORAGE, DISPOSED, etc.) and physical condition as assets move or are repaired/disposed.
- Always update location when moving assets.

---

## 8. Storage Management

- Storage components can be linked to storage slots.
- To move an asset to storage: Edit its status to "STORAGE" and assign a storage slot.
- View storage inventory via the "Storage" tab, which lists all stored components.

---

## 9. Reporting & Exports

- Access reports from the "Reports" or "Dashboard" section.
- Use:
    - **Component Totals:** For total count and value by category.
    - **Disposed Parts:** For assets marked as disposed.
    - **Stored Components:** For items currently in storage.
- Export any report as CSV by clicking "Export".

---

## 10. Troubleshooting

- **Cannot log in:** Check credentials or contact admin.
- **Cannot add/edit/delete asset:** Check required fields or if asset is linked elsewhere.
- **Asset not showing in expected list:** Check filters/status(button or option panel).
- **Export not working:** Ensure popups/downloads are enabled in your browser.

---

## 11. FAQs

- **Q:** Can I recover a deleted asset?  
  **A:** No; deletion is permanent (unless soft-delete is implemented).

- **Q:** Who can manage employees?  
  **A:** Only users with the DBA role.

- **Q:** Can I assign the same component to multiple PC setups?  
  **A:** No, each component can only be assigned to one setup at a time.

- **Q:** What should I do if I spot a data mistake?  
  **A:** Edit the entry or notify an admin for correction.

---
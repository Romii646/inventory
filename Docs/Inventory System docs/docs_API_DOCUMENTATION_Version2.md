# Created by: Aaron C.
# Date: 05/28/2025

# API Documentation: Main Inventory System

---

## Introduction

The Main Inventory System exposes a RESTful API for managing assets, PC setups, employees, and storage. All endpoints require authentication.

---

## Authentication

- **Login:** `POST /api/login`  
    Request: `{ "employee_id": "john123", "password": "yourpassword" }`  
    Response: `{ "token": "..." }`
- All other endpoints require an `Authorization: Bearer <token>` header.

---

## Asset Endpoints

### Accessories

- `GET /api/accessories` — List all accessories
- `GET /api/accessories/{acc_id}` — Get accessory details
- `POST /api/accessories` — Add accessory
- `PUT /api/accessories/{acc_id}` — Update accessory
- `DELETE /api/accessories/{acc_id}` — Delete accessory

### (Repeat for all asset types: graphicscards, keyboards, mice, minipc, monitors, motherboards, powersupplies, ramsticks, storage_components)

---

## PC Setups

- `GET /api/pcsetups` — List all PC setups
- `GET /api/pcsetups/{pc_id}` — Get PC setup details
- `POST /api/pcsetups` — Create new PC setup
- `PUT /api/pcsetups/{pc_id}` — Update setup
- `DELETE /api/pcsetups/{pc_id}` — Delete setup

---

## Employees

- `GET /api/employees` — List employees (DBA only)
- `GET /api/employees/{employee_id}` — Get employee details
- `POST /api/employees` — Add new employee (DBA only)
- `PUT /api/employees/{employee_id}` — Update employee
- `DELETE /api/employees/{employee_id}` — Remove employee

---

## Storage

- `GET /api/storage_components` — List all storage components
- `GET /api/storage_slots` — List all storage slots
- `POST /api/storage_components` — Add storage component
- `POST /api/storage_slots` — Add storage slot

---

## Reporting & Views

- `GET /api/reports/component_totals` — Get component totals
- `GET /api/reports/disposed_parts` — Get disposed assets
- `GET /api/reports/stored_components_storage` — Get storage inventory
- All reporting endpoints support CSV export with `Accept: text/csv` header.

---

## Errors

- Standard HTTP status codes used.
- Error responses: `{ "error": "Description" }`

---

## Notes

- All endpoints require authentication and proper employee role.
- See [Developer Guide](Inventory_System_Developer_Guide.md) for implementation details.

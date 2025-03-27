# Cyber Lab Inventory System

## Overview
The Cyber Lab Inventory System is a web-based application designed to manage and track computer components in a cyber lab. It allows users to add, view, update, and delete records of various components such as PCs, motherboards, GPUs, RAM sticks, power supplies, monitors, accessories, keyboards, and mice.

## Project Structure
```
/c:/xampp/htdocs/inventory/
├── cyberScript.js
├── database.php
├── database_operations.php
├── formProcess.php
├── formStyle.css
├── homePage.html
├── inventoryForm.html
├── pcSetUpProcess.php
├── SQL_statement_generator.php
├── validate_error_functions.php
├── wLInventory.php
```

## Setup Instructions

1. **Install XAMPP:**
   - Download and install XAMPP from [Apache Friends](https://www.apachefriends.org/index.html).

2. **Clone the Repository:**
   - Clone this repository into the `htdocs` directory of your XAMPP installation.

3. **Start XAMPP:**
   - Open the XAMPP Control Panel and start the Apache and MySQL services.

4. **Database Setup:**
   - Create a MySQL database named `inventory`.
   - Import the SQL schema to create the necessary tables.

5. **Configure Database Connection:**
   - Update the database connection details in `database.php`.

6. **Set Writable Permissions:**
   - Ensure the error log paths in `pcSetUpProcess.php` and `database_operations.php` are writable.

## Usage

### Home Page
- **URL:** `http://localhost/inventory/homePage.html`
- Displays the current inventory of PCs and allows users to add, update, or delete records.

### Inventory Form
- **URL:** `http://localhost/inventory/inventoryForm.html`
- Provides forms to add, view, update, and delete records for various components.

### Scripts and Styles
- **cyberScript.js:** Contains JavaScript functions for form handling and AJAX requests.
- **formStyle.css:** Contains CSS styles for the forms and layout.

## File Descriptions

### `pcSetUpProcess.php`
Handles the backend processing for viewing, adding, updating, and deleting PC setup records.

### `database.php`
Manages the database connection and provides methods to connect and close the database.

### `database_operations.php`
Contains classes for database operations such as insert, update, delete, and query.

### `formProcess.php`
Processes form submissions for adding, viewing, updating, and deleting records.

### `SQL_statement_generator.php`
Generates SQL statements for insert and update operations.

### `validate_error_functions.php`
Contains functions for validating input data and displaying errors.

### `wLInventory.php`
Includes external file listings and utility functions such as finding primary key names.

## Error Handling
- Errors are logged to `php-error.log` and `database_operations_error_log.log`.
- Ensure these files are writable by the web server.

## Author
Created by Aaron C.

# Cyber Lab Inventory System

## Overview
The Cyber Lab Inventory System is a web-based application designed to manage and track computer components in a cyber lab. It allows users to add, view, update, and delete records of various components such as PCs, motherboards, GPUs, RAM sticks, power supplies, monitors, accessories, keyboards, and mice.

## Project Structure
```
/c:/xampp/htdocs/inventory/
├── composer.json
├── css/
│   ├── cyberStyles.css
│   └── formStyle.css
├── homePage.html
├── inventory.code-workspace
├── inventoryForm.html
├── inventdev.sql
├── js/
│   ├── cyberScript.js
│   └── formScript.js
├── php/
│   ├── database.php
│   ├── database_operations.php
│   ├── form_process.php
│   ├── pc_set_up_process.php
│   ├── SQL_statement_generator.php
│   ├── validate_error_functions.php
│   └── word_bank.php
├── src/
│   └── MyClass.php
├── test.php
├── vendor/
│   ├── autoload.php
│   ├── composer/
│   │   ├── autoload_classmap.php
│   │   ├── autoload_namespaces.php
│   │   ├── autoload_psr4.php
│   │   ├── autoload_real.php
│   │   ├── autoload_static.php
│   │   ├── ClassLoader.php
│   │   └── LICENSE
├── README.md
```

## Setup Instructions

1. **Install XAMPP:**
   - Download and install XAMPP from [Apache Friends](https://www.apachefriends.org/index.html).

2. **Clone the Repository:**
   - Clone this repository into the `htdocs` directory of your XAMPP installation.

3. **Start XAMPP:**
   - Open the XAMPP Control Panel and start the Apache and MySQL services.

4. **Database Setup:**
   - Create a MySQL database named `inventdev`.
   - Import the `inventdev.sql` file to create the necessary tables and populate initial data.

5. **Configure Database Connection:**
   - Update the database connection details in `php/database.php`.

6. **Set Writable Permissions:**
   - Ensure the error log paths in `php/pc_set_up_process.php` and `php/database_operations.php` are writable.

## Usage

### Home Page
- **URL:** `http://localhost/inventory/homePage.html`
- Displays the current inventory of PCs and allows users to add, update, or delete records.

### Inventory Form
- **URL:** `http://localhost/inventory/inventoryForm.html`
- Provides forms to add, view, update, and delete records for various components.

### Scripts and Styles
- **CSS:**
  - `css/cyberStyles.css`: Styles for the home page.
  - `css/formStyle.css`: Styles for the inventory form.
- **JavaScript:**
  - `js/cyberScript.js`: Contains JavaScript functions for form handling and AJAX requests.
  - `js/formScript.js`: Handles table viewing functionality.

## File Descriptions

### Configuration and Setup
- **`composer.json`**: Defines dependencies and autoloading for the project.
- **`inventory.code-workspace`**: VS Code workspace configuration.

### HTML Pages
- **`homePage.html`**: Main page for viewing and managing PC setups.
- **`inventoryForm.html`**: Form page for managing individual component records.

### SQL
- **`inventdev.sql`**: SQL dump for creating and populating the database.

### PHP Backend
- **`php/database.php`**: Manages database connections.
- **`php/database_operations.php`**: Contains classes for database operations (insert, update, delete, query).
- **`php/form_process.php`**: Processes form submissions for various operations.
- **`php/pc_set_up_process.php`**: Handles AJAX requests for managing PC setups.
- **`php/SQL_statement_generator.php`**: Generates SQL statements dynamically.
- **`php/validate_error_functions.php`**: Validates input data and handles errors.
- **`php/word_bank.php`**: Utility functions and constants for table operations.

### PHP Classes
- **`src/MyClass.php`**: Example PHP class for testing.

### Testing
- **`test.php`**: Example script to test the `MyClass` functionality.

### Vendor
- **`vendor/`**: Contains Composer's autoload files and dependencies.

## Error Handling
- Errors are logged to `php-error.log` and `database_operations_error_log.log`.
- Ensure these files are writable by the web server.

## Author
Created by Aaron C.

# System Architecture Document

## Overview
The system manages rentals, customer management, inventory integration, and generates CSV files.

## Architectural Drivers
- Scalability
- Security
- AI integration
- Tech item rentals

## System Components
- **Frontend:** HTML, JavaScript, CSS
- **Backend:** PHP
- **Database:** MariaDB/MySQL

## Data Flow
1. Employee interacts with the UI
2. API processes the request
3. Database updates related tables

## Security Measures
- Role-based access control
- PDO for SQL injection prevention
- Audit logging

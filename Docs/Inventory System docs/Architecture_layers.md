# Rental System – Layered Architecture

This document describes the layered architecture of the Rental System, illustrating the main components and their interactions.

---

## Layers Overview

1. **Presentation Layer (View)**
    - `LoginForm`: Handles user input for login.

2. **Controller Layer**
    - `RentalController`: Manages rental operations.
    - `LoginController`: Handles login logic.
    - `CustomerController`: Manages customer-related actions.

3. **Application Logic Layer (Service/Manager)**
    - `EmployeeManager`: Handles employee-related business logic.
    - `CustomerManager`: Manages customer business logic.
    - `RentalManager`: Handles rental business logic.

4. **Model / Domain Layer**
    - `Employee`, `Customer`, `Rental`, `Item`: Core business entities.

5. **SQL Operation Layer (Persistence)**
    - `SQLOp`: Base class for SQL operations.
    - `insertOp`, `updateOp`, `deleteOp`, `queryOp`: Specific SQL operations.

6. **Utility Layer**
    - `SQLHelper`: Utility for SQL operations.

---

## Interaction Flow

### Login Process

1. **User** enters email/password in **LoginForm**.
2. **LoginForm** submits credentials to **LoginController**.
3. **LoginController** calls **EmployeeManager** to verify login.
4. **EmployeeManager** connects to the database via **SQLOp** and uses **queryOp** to fetch employee data.
5. If credentials are valid, an **Employee** object is constructed.

### Rental Process

1. **User** initiates a rental via **RentalController**.
2. **RentalController** interacts with:
    - **RentalManager** to add a rental.
    - **Customer** and **Item** to fetch and validate data.
    - **Employee** for session management.
3. **RentalManager** uses **insertOp** to insert a rental record, which inherits the connection from **SQLOp**.
4. **RentalManager** creates a **Rental** object with the relevant data.

### Customer Management

1. **User** manages customers via **CustomerController**.
2. **CustomerController** calls **CustomerManager** for registration, editing, or deletion.
3. **CustomerManager**:
    - Creates or updates **Customer** models.
    - Uses **insertOp**, **updateOp**, and **deleteOp** for database operations.

---

## Relationships

- **Rental** has associations with **Customer**, **Item**, and **Employee**.
- **SQLHelper** uses **SQLOp** for database operations.

### Inheritance

- **EmployeeManager**, **CustomerManager**, and **RentalManager** inherit from **SQLOp**.
- **insertOp**, **updateOp**, **deleteOp**, and **queryOp** inherit from **SQLOp**.

---

## Diagram

Below is a PlantUML diagram representing the layered architecture and interactions:

```plantuml
@startuml
title Rental System – Layered Architecture Interaction

actor User

package "Presentation Layer (View)" {
  class LoginForm
}

package "Controller Layer" {
  class RentalController
  class LoginController
  class CustomerController
}

package "Application Logic Layer (Service/Manager)" {
  class EmployeeManager
  class CustomerManager
  class RentalManager
}

package "Model / Domain Layer" {
  class Employee
  class Customer
  class Rental
  class Item
}

package "SQL Operation Layer (Persistence)" {
  class SQLOp
  class insertOp
  class updateOp
  class deleteOp
  class queryOp
}

package "Utility Layer" {
  class SQLHelper
}

User --> LoginForm : enters email/password
LoginForm --> LoginController : submit login
LoginController --> EmployeeManager : verifyLogin(email, password)
EmployeeManager --> SQLOp : connect()
EmployeeManager --> queryOp : SELECT * FROM employees
queryOp --> SQLOp : inherits connection
EmployeeManager --> Employee : construct if password OK

User --> RentalController : clicks rent item
RentalController --> RentalManager : addRental()
RentalController --> Customer : fetch for rental
RentalController --> Item : fetch & validate
RentalController --> Employee : uses session
RentalManager --> insertOp : insert rental record
insertOp --> SQLOp : inherits connection
RentalManager --> Rental : use data

User --> CustomerController : manage customer
CustomerController --> CustomerManager : register/edit/delete
CustomerManager --> Customer : create or update model
CustomerManager --> insertOp : uses internally
CustomerManager --> updateOp : uses internally
CustomerManager --> deleteOp : uses internally

Rental --> Customer : has
Rental --> Item : has
Rental --> Employee : processed by

RentalController --> RentalManager
RentalController --> Customer
RentalController --> Item
RentalController --> Employee

SQLHelper ..> SQLOp : uses

EmployeeManager --|> SQLOp
CustomerManager --|> SQLOp
RentalManager --|> SQLOp
insertOp --|> SQLOp
updateOp --|> SQLOp
deleteOp --|> SQLOp
queryOp --|> SQLOp
@enduml
```

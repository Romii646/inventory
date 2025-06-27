@startuml
' =======================
' Abstract & Utility Layer
' =======================
abstract class SQLOp {
    - $SQLstring
    - $tableName
    - $conn
    + connect()
    + Db_close()
}

class SQLHelper {
    + alignColumnNames()
    + update_string()
    + sql_inserting_com()
}

SQLHelper ..> SQLOp : uses connection

' =======================
' Model Layer
' =======================
class Employee {
    - employeeID
    - employeeType
    - password
    - email
    - firstName
    + getEmployeeID()
    + getEmployeeType()
    + getFirstName()
    + verifyPassword()
}

class Customer {
    - customerID
    - name
    - contact
    - B#
    - joinDate
    + getName()
    + getContactInfo()
}

class Item {
    - object_id
    - item_id
    - status
    + markRented()
    + markAvailable()
    + isAvailable()
}

class Rental {
    - rental_id
    - object_id
    - customer_id
    - employee_id
    - start_date
    - expected_return_date
    - actual_return_date
    - status
    + markReturned(date)
    + isOverdue(today)
}

' =======================
' Manager/Repository Layer
' =======================
class EmployeeManager {
    + verifyLogin(email, password): Employee
}

class CustomerManager {
    + registerCustomer(Customer)
    + deleteCustomer(id)
    + editCustomer(Customer)
    + getCustomer(id): Customer
}

class RentalManager {
    + addRental(Rental)
    + updateRental(Rental)
    + getRental(id): Rental
}

EmployeeManager --|> SQLOp
CustomerManager --|> SQLOp
RentalManager --|> SQLOp

' =======================
' Operation Layer (Extending SQLOp)
' =======================
class insertOp {
    - $p_id
    - $arrayVariable
    - $tableName
    + add_query()
    + set_table_names()
    + executeQuery()
}

class updateOp {
    - $statement
    + set_table_name()
    + update_table()
}

class deleteOp {
    + set_table_delete()
    + delete_row()
}

class queryOp {
    - $stmt
    + set_table_name()
    + query_table()
    + print_table()
}

insertOp --|> SQLOp
updateOp --|> SQLOp
deleteOp --|> SQLOp
queryOp --|> SQLOp

' =======================
' Relationships
' =======================
Rental --> Customer : belongs to
Rental --> Item : involves
Rental --> Employee : processed by
RentalManager --> Rental
CustomerManager --> Customer
EmployeeManager --> Employee
@enduml
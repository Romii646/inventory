window.rentalTables = {

    "rental": [
        {
            "rent_id": "Rental ID",
            "customer_id": "Customer ID",
            "object_id": "Item ID",
            "employee_id" : "Employee ID",
            "rental_start_date" : "Start Date",
            "rental_return_date" : "Expected Return Date",
            "actual_return_date" : "Actual return date (leave blank if registering a new rental)",
            "status": ["active", "overdue", "returned"],
            "rental_total" : "Rental totalS"
        }
    ],
    "overdueRentals": [
        {
            "rental_id": "Rental ID",
            "customer_id": "Customer ID",
            "object_id": "Item ID",
            "start_date": "Start Date",
            "expected_return_date": "Expected Return Date",
            "status": ["overdue"]
        }
    ]
    // ...add more as needed
};
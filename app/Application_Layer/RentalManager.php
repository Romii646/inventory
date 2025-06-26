<?php
/**
 * Rental Manager Class
 * 
 * @author Aaron C.
 * @date 05/30/2025
 */

require_once '../Utility/word_bank.php';
require_once $configurationFile;
require_once $SQLOperationFile;
require_once $rentalFile;

class RentalManager extends SQLOp {

    function addRental($objectID, $BNumber, $employeeID, $rentalStartDate, $expectedReturnDate, $status, $totalPrice, $actualReturnDate = NULL) {
        require_once $itemFile;
        $customerManager = new CustomerManager();
        $customer = $customerManager -> getCustomer($BNumber);
        if(!$customer) return false; // Customer not found
        $rental = new Rental(
            null, // rentalID will be set by the database
            $objectID,
            $customer -> getCustomerID(),
            $employeeID,
            $rentalStartDate,
            $expectedReturnDate,
            $status,
            $totalPrice,
            $actualReturnDate
        );
        $insert = new insertOp();
        $insert -> set_table_names(
            'object_id',
            'customer_id',
            'employee_id', 
            'rental_start_date', 
            'rental_return_date', 
            'actual_return_date', 
            'status', 
            'total_price'
        );
        $statement = $insert -> add_query(
            'rental', 
            $rental -> getObjectID(), 
            $rental -> getCustomerID(), 
            $rental -> getEmployeeID(), 
            $rental -> getRentalStartDate(), 
            $rental -> getExpectedReturnDate(), 
            $rental -> getActualReturnDate(), 
            $rental -> getStatus(), 
            $rental -> getTotalPrice()
        );
        if($insert -> execute_query($statement)) {
            return $insert -> get_last_inserted_id();
        } else {
            return false;
        }
    }

    function getRentalByBNumber ($BNumber){// Query to get all rentals for a customer by BNumber
        $this -> SQLstring = "SELECT * FROM rental WHERE customer_id IN (SELECT customer_id FROM customer WHERE BNumber = :BNumber)"; 
        $this -> $statement = $this -> conn -> prepare($this -> SQLstring);
        $this -> statement -> bindParam(':BNumber', $BNumber);
        $this -> statement -> execute();
        if($this -> statement -> rowCount > 0) {
            $rentals = [];
            while($row = $this -> statement -> fetch(PDO::FETCH_ASSOC)) {
                $rentals[] = new Rental(
                    $row['rental_id'],
                    $row['object_id'],
                    $row['customer_id'],
                    $row['employee_id'],
                    $row['rental_start_date'],
                    $row['expected_return_date'],
                    $row['actual_return_date'],
                    $row['status'],
                    $row['total_price']
                );
            }
            return $rentals;
        } else {
            return false; // No rentals found for the given BNumber
        }
    }

    function upDateRental($rentalData){// Function to update rental information for the status column active, returned, or overdue
        $tableName = 'rental';
        $updateOp = new updateOp();
        $updateOp -> set_table_update($tableName, $rentalData);
        return $updateOp -> update_table();
    }

    function deleteRental($rentalID) {
        $deleteOp = new deleteOp();
        $deleteOp -> set_table_delete('rental', 'rental_id', $rentalID);
        return $deleteOp -> delete_row();
    }

    function handleOverDueRentals() {
        $currentDate = date('y-m-d');
        $this -> SQLstring = "UPDATE rental SET status = 'overdue' WHERE expected_return_date < :currentDate AND status = 'active'";
        $this -> statement = $this -> conn -> prepare($this -> SQLstring);
        $this -> statement -> bindParam(':currentDate', $currentDate);
        $this -> statement -> execute();
    }
}
?>
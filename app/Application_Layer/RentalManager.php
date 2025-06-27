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
        try {
            require_once $itemFile;
            $customerManager = new CustomerManager();
            $customer = $customerManager->getCustomer($BNumber);
            if (!$customer) {
                writeLog("Customer not found for BNumber: $BNumber", 'rental', 'ERROR');
                return false;
            }
            $rental = new Rental(
                null,
                $objectID,
                $customer->getCustomerID(),
                $employeeID,
                $rentalStartDate,
                $expectedReturnDate,
                $status,
                $totalPrice,
                $actualReturnDate
            );
            $insert = new insertOp();
            $insert->set_table_names(
                'object_id',
                'customer_id',
                'employee_id', 
                'rental_start_date', 
                'rental_return_date', 
                'actual_return_date', 
                'status', 
                'total_price'
            );
            $statement = $insert->add_query(
                'rental', 
                $rental->getObjectID(), 
                $rental->getCustomerID(), 
                $rental->getEmployeeID(), 
                $rental->getRentalStartDate(), 
                $rental->getExpectedReturnDate(), 
                $rental->getActualReturnDate(), 
                $rental->getStatus(), 
                $rental->getTotalPrice()
            );
            if ($insert->execute_query($statement)) {
                writeLog("Rental added: " . json_encode($rental), 'rental', 'INFO');
                return $insert->get_last_inserted_id();
            } else {
                writeLog("Rental insert failed for: " . json_encode([
                    $objectID, $BNumber, $employeeID, $rentalStartDate, $expectedReturnDate, $status, $totalPrice, $actualReturnDate
                ]), 'rental', 'ERROR');
                return false;
            }
        } catch (Exception $e) {
            writeLog("Error in addRental: " . $e->getMessage(), 'rental', 'ERROR');
            return false;
        }
    }

    function getRentalByBNumber($BNumber) {
        try {
            $this->SQLstring = "SELECT * FROM rental WHERE customer_id IN (SELECT customer_id FROM customer WHERE BNumber = :BNumber)";
            $this->statement = $this->conn->prepare($this->SQLstring);
            $this->statement->bindParam(':BNumber', $BNumber);
            $this->statement->execute();
            if ($this->statement->rowCount() > 0) {
                $rentals = [];
                while ($row = $this->statement->fetch(PDO::FETCH_ASSOC)) {
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
                writeLog("No rentals found for BNumber: $BNumber", 'rental', 'INFO');
                return false;
            }
        } catch (Exception $e) {
            writeLog("Error in getRentalByBNumber: " . $e->getMessage(), 'rental', 'ERROR');
            return false;
        }
    }

    function upDateRental($rentalData) {
        try {
            $tableName = 'rental';
            $updateOp = new updateOp();
            $updateOp->set_table_update($tableName, $rentalData);
            $result = $updateOp->update_table();
            if ($result) {
                writeLog("Rental updated: " . json_encode($rentalData), 'rental', 'INFO');
            } else {
                writeLog("Rental update failed: " . json_encode($rentalData), 'rental', 'ERROR');
            }
            return $result;
        } catch (Exception $e) {
            writeLog("Error in upDateRental: " . $e->getMessage(), 'rental', 'ERROR');
            return false;
        }
    }

    function deleteRental($rentalID) {
        try {
            $deleteOp = new deleteOp();
            $result = $deleteOp->delete_row();
            if ($result) {
                writeLog("Rental deleted: $rentalID", 'rental', 'INFO');
            } else {
                writeLog("Rental deletion failed: $rentalID", 'rental', 'ERROR');
            }
            return $result;
        } catch (Exception $e) {
            writeLog("Error in deleteRental: " . $e->getMessage(), 'rental', 'ERROR');
            return false;
        }
    }

    function handleOverDueRentals() {
        try {
            $currentDate = date('Y-m-d');
            $this->SQLstring = "UPDATE rental SET status = 'overdue' WHERE expected_return_date < :currentDate AND status = 'active'";
            $this->statement = $this->conn->prepare($this->SQLstring);
            $this->statement->bindParam(':currentDate', $currentDate);
            $this->statement->execute();
            writeLog("Overdue rentals updated for date: $currentDate", 'rental', 'INFO');
        } catch (Exception $e) {
            writeLog("Error in handleOverDueRentals: " . $e->getMessage(), 'rental', 'ERROR');
        }
    }
}
?>
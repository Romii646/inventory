<?php
// Created by Aaron C.
// Date: 05/30/2025

require_once '../Utility/word_bank.php';
require_once $SQLOperationFile;
require_once $customerFile;
class CustomerManager extends SQLOp {
    // get customer by student number
    function getCustomer($bNumber){
        try {
            $this->SQLstring = "SELECT * FROM customer WHERE BNumber = :BNumber";
            $this->statement = $this->conn->prepare($this->SQLstring);
            $this->statement->bindParam(':BNumber', $bNumber);
            $this->statement->execute();
            if ($this->statement->rowCount() > 0) {
                $row = $this->statement->fetch(PDO::FETCH_ASSOC);
                return new Customer(
                    $row['customer_id'],
                    $row['first_name'],
                    $row['last_name'],
                    $row['email'],
                    $row['BNumber'],
                    $row['registration_date']
                );
            }
            return null;
        } catch (Exception $e) {
            writeLog("Error in getCustomer: " . $e->getMessage(), 'customer', 'ERROR');
            return null;
        }
    }

    // register a new customer
    function registerCustomer($post){
        try {
            $joinDate = date('Y-m-d');
            $customer = new Customer(
                null, // customer_id will be set by the database
                $post['firstName'],
                $post['lastName'],
                $post['email'],
                $post['bNumber'],
                $joinDate
            );
            $insert = new insertOp();

            $insert->set_table_names(
                'first_name',
                'last_name',
                'email',
                'BNumber',
                'registration_date'
            );

            $statement = $insert->add_query(
                'customer',
                $customer->getFirstName(),
                $customer->getLastName(),
                $customer->getEmail(),
                $customer->getBNumber(),
                $customer->getRegistrationDate()
            );

            if ($insert->execute_query($statement)) {
                writeLog("Customer registered: " . json_encode($post), 'customer', 'INFO');
                return $insert->get_last_inserted_id(); // Return the customer ID
            } else {
                writeLog("Customer registration failed for: " . json_encode($post), 'customer', 'ERROR');
                return false;
            }
        } catch (Exception $e) {
            writeLog("Error in registerCustomer: " . $e->getMessage(), 'customer', 'ERROR');
            return false;
        }
    }

    // delete a customer
    function deleteCustomer($customerID){
        try {
            $delete = new deleteOp();
            $delete->set_table_delete('customer', 'customer_id', $customerID);
            if ($delete->delete_row()) {
                writeLog("Customer deleted: $customerID", 'customer', 'INFO');
                return true; // Customer deleted successfully
            } else {
                writeLog("Customer deletion failed for ID: $customerID", 'customer', 'ERROR');
                return false;
            }
        } catch (Exception $e) {
            writeLog("Error in deleteCustomer: " . $e->getMessage(), 'customer', 'ERROR');
            return false;
        }
    }

    // edit a customer
    function editCustomer($customerData){
        try {
            $tableName = 'customer';
            $update = new updateOp();
            $update->set_table_update($tableName, $customerData);
            if ($update->update_table()) {
                writeLog("Customer updated: " . json_encode($customerData), 'customer', 'INFO');
                return true; // Customer updated successfully
            } else {
                writeLog("Customer update failed for: " . json_encode($customerData), 'customer', 'ERROR');
                return false;
            }
        } catch (Exception $e) {
            writeLog("Error in editCustomer: " . $e->getMessage(), 'customer', 'ERROR');
            return false;
        }
    }
}
?>
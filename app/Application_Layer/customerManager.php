<?php
// Created by Aaron C.
// Date: 05/30/2025
require "../Utility/word_bank.php";
require $SQLOperationFile;
require $customerFile;

class CustomerManager extends SQLOp {
    // get customer by student number
    function getCustomer($bNumber){
        $this -> SQLstring = "SELECT * FROM customer WHERE BNumber = :BNumber";
        $this -> statement = $this -> conn -> prepare($this -> SQLstring);
        $this -> statement -> bindParam(':BNumber', $bNumber);
        $this -> statement -> execute();
        if($this -> statement -> rowCount () > 0){
            $row = $this -> statemnt -> fetch(PDO::FETCH_ASSOC);
            return new Customer (
                $row['customer_id'],
                $row['first_name'],
                $row['last_name'],
                $row['email'],
                $row['BNumber'],
                $row['registration_date'],
            );
        }
    }
}

//function registerCustomer($firstName, $lastName, $email, $BNumber, $registrationDate)
function registerCustomer($post){
    $joinDate = date('y-m-d');
    $customer = new Customer(
        null, // customer_id will be set by the database
        $post['firstName'],
        $post['lastName'],
        $post['email'],
        $post['bNumber'],
        $post['joinDate']
    );
    $insert = new insertOp();

    $insert -> set_table_names(
        'first_name',
        'last_name',
        'email',
        'BNumber',
        'registration_date'
    );

   $statement = $insert -> add_query(
        'customer',
        $customer -> getFirstName(),
        $customer -> getLastName(),
        $customer -> getEmail(),
        $customer -> getBNumber(),
        $customer -> getRegistrationDate()
    );

    if($insert -> execute_query($statement)){
        return $insert -> get_last_inserted_id(); // Return the customer ID
    } else {
        return false; // Registration failed
    }
}
// function deleteCustomer
function deleteCustomer($customerID){
    $delete = new deleteOp();
    $delete -> set_table_delete('customer', 'customer_id', $customerID);
    if($delete -> delete_row()){
        return true; // Customer deleted successfully
    } else {
        return false; // Deletion failed
    }
}
// function editCustomer
function editCustomer($customerData){
    $tableName = 'customer';
    $update = new updateOp();
    $update -> set_table_update($tableName, $customerData);
    if($update -> update_table()){
        return true; // Customer updated successfully
    } else {
        return false; // Update failed
    }
}
?>
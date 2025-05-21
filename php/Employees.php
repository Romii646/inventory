<?php
// Start of employee object file
// Author: Aaron Cortina
// Date: 05/20/2025
require 'word_bank.php';
require $SQLOperationFile;

class Employee extends SQLOp{
    private $employeeID;
    private $firstName;
    private $password;
    private $employeeType;

    function __construct($employeeID, $passWord){
        $this -> $employeeID = $employeeID;
        $this -> $firstName = $firstName;
    }

    function getEmployeeID(){
        return $this -> employeeID;
    }
    function getFirstName(){
        return $this -> firstName;
    }
    function getEmployeeType(){
        return $this -> employeeType;
    }

    function setEmployeeID($employeeID){
        $this -> employeeID = $employeeID;
    }
    function setFirstName($firstName){
        $this -> firstName = $firstName;
    }
    function setPassword($password){
        $this -> password = $password;
    }
    function setEmployeeType($employeeType){
        $this -> employeeType = $employeeType;
    }

    // Function to verify login credentials
    // This function will check if the employeeID and password match any record in the database
    function verifyLogin(){
        $this -> SQLstring = "SELECT employeeID, firstName, employeeType FROM employees WHERE employeeID = :employeeID AND password = :password";
        $this -> statement = $this -> conn -> prepare($this -> SQLstring);
        $this -> statement -> bindParam(':employeeID', $this -> employeeID);
        $this -> statement -> bindParam(':password', $this -> password);
        $this -> statement -> execute();

        if($this -> statement -> rowCount() > 0){
            $row = $this -> statement -> fetch(PDO::FETCH_ASSOC);// fetch the row
            $this -> employeeID = $row['employeeID'];
            $this -> firstName = $row['firstName'];
            $this -> employeeType = $row['employeeType'];
        } else {
            return false; // no matching record found for the given employeeID and password
        }
        return true; // matching record found for the given employeeID and password
    }
    // Function to register a new employee
    // This function will hash the password before storing it in the database
    function registerEmployee(){
        $hashPassword = password_hash($this -> password, PASSWORD_DEFAULT); // hash the password
        $this -> SQLstring = "INSERT INTO employees (firstName, password, employeeType) VALUES (:firstName, :password, :employeeType)";
        $this -> statement = $this -> conn -> prepare($this -> SQLstring);
        $this -> statement -> bindParam(':firstName', $this -> firstName);
        $this -> statement -> bindParam(':password', $hashPassword);
        $this -> statement -> bindParam(':employeeType', $this -> employeeType);
        return $this -> statement -> execute(); // this will return true if the insert was successful
    }
}
?>
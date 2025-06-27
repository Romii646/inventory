<?php
// Created by Aaron C.
// Date: 05/30/2025

class Customer {
    private $customerID;
    private $firstName;
    private $lastName;
    private $email;
    private $BNumber;
    private $registrationDate;

    function __construct($customerID, $firstName, $lastName, $email, $BNumber, $registrationDate) {
        $this -> customerID = $customerID;
        $this -> firstName = $firstName;
        $this -> lastName = $lastName;
        $this -> password = $password;
        $this -> email = $email;
        $this -> BNumber = $BNumber;
        $this -> registrationDate = $registrationDate;
    }

    function getPassword() {
        return $this -> password;
    }

    function getCustomerID() {
        return $this -> customerID;
    }
    function getFirstName() {
        return $this -> firstName;
    }
    function getLastName() {
        return $this -> lastName;
    }
    function getEmail() {
        return $this -> email;
    }
    function getBNumber() {
        return $this -> BNumber;
    }
    function getRegistrationDate() {
        return $this -> registrationDate;
    }
    function setCustomerID($customerID) {
        $this -> customerID = $customerID;
    }
    function setFirstName($firstName) {
        $this -> firstName = $firstName;
    }
    function setLastName($lastName) {
        $this -> lastName = $lastName;
    }
    function setEmail($email) {
        $this -> email = $email;
    }
    function setBNumber($BNumber) {
        $this -> BNumber = $BNumber;
    }
    function setRegistrationDate($registrationDate) {
        $this -> registrationDate = $registrationDate;
    }
}

?>
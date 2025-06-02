<?php
// Created by Aaron C.
// Date: 05/30/2025

class Rental {
    private $rentalID;
    private $objectID;
    private $customerID;
    private $employeeID;
    private $rentalStartDate;
    private $expectedReturnDate;
    private $actualReturnDate;
    private $status;
    private $totalPrice;

    function __construct($rentalID, $objectID, $customerID, $employeeID, $rentalStartDate, $expectedReturnDate, $actualReturnDate, $status, $totalPrice) {
        $this -> rentalID = $rentalID;
        $this -> objectID = $objectID;
        $this -> customerID = $customerID;
        $this -> employeeID = $employeeID;
        $this -> rentalStartDate = $rentalStartDate;
        $this -> expectedReturnDate = $expectedReturnDate;
        $this -> actualReturnDate = $actualReturnDate;
        $this -> status = $status;
        $this -> totalPrice = $totalPrice;
    }
    function getRentalID() {
        return $this -> rentalID;
    }
    function getObjectID() {
        return $this -> objectID;
    }
    function getCustomerID() {
        return $this -> customerID;
    }
    function getEmployeeID() {
        return $this -> employeeID;
    }
    function getRentalStartDate() {
        return $this -> rentalStartDate;
    }
    function getExpectedReturnDate() {
        return $this -> expectedReturnDate;
    }
    function getActualReturnDate() {
        return $this -> actualReturnDate;
    }
    function getStatus() {
        return $this -> status;
    }
    function getTotalPrice() {
        return $this -> totalPrice;
    }
    function setRentalID($rentalID) {
        $this -> rentalID = $rentalID;
    }
    function setObjectID($objectID) {
        $this -> objectID = $objectID;
    }
    function setCustomerID($customerID) {
        $this -> customerID = $customerID;
    }
    function setEmployeeID($employeeID) {
        $this -> employeeID = $employeeID;
    }
    function setRentalStartDate($rentalStartDate) {
        $this -> rentalStartDate = $rentalStartDate;
    }
    function setExpectedReturnDate($expectedReturnDate) {
        $this -> expectedReturnDate = $expectedReturnDate;
    }
    function setActualReturnDate($actualReturnDate) {
        $this -> actualReturnDate = $actualReturnDate;
    }
    function setStatus($status) {
        $this -> status = $status;
    }
    function setTotalPrice($totalPrice) {
        $this -> totalPrice = $totalPrice;
    }
}
?>
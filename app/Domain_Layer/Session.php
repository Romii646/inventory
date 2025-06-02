<?php
// Created by Aaron C.
// Date: 05/30/2025

class Session {
    private $sessionID;
    private $employeeID;
    private $firstName;
    private $employeeType;
    private $startTime;
    private $endTime;

    function __construct($sessionID, $employeeID, $firstName, $employeeType, $startTime, $endTime) {
        $this -> employeeID = $employeeID;
        $this -> firstName = $firstName;
        $this -> employeeType = $employeeType;
    }
    function getSessionID() {
        return $this -> sessionID;
    }
    function getEmployeeID() {
        return $this -> employeeID;
    }
    function getFirstName() {
        return $this -> firstName;
    }

    function getEmployeeType() {
        return $this -> employeeType;
    }
    function getStartTime() {
        return $this -> startTime;
    }
    function getEndTime() {
        return $this -> endTime;
    }
    function setSessionID($sessionID) {
        $this -> sessionID = $sessionID;
    }
    function setEmployeeID($employeeID) {
        $this -> employeeID = $employeeID;
    }
    function setFirstName($firstName) {
        $this -> firstName = $firstName;
    }
    function setEmployeeType($employeeType) {
        $this -> employeeType = $employeeType;
    }
    function setStartTime($startTime) {
        $this -> startTime = $startTime;
    }
    function setEndTime($endTime) {
        $this -> endTime = $endTime;
    }  
}
?>
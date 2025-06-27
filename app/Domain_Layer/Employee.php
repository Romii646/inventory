<?php
// Start of employee object file
// Author: Aaron Cortina
// Date: 05/20/2025


class Employee {
    private $employeeID;
    private $firstName;
    private $password;
    private $employeeType;

    function __construct($employeeID, $password, $firstName = null, $employeeType = null){
        $this -> employeeID = $employeeID;
        $this -> password = $password;
        $this -> firstName = $firstName;
        $this -> employeeType = $employeeType;
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
    function getPassword(){
        return $this -> password;
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

    function verifyPassword($verifyPassword){
        if($this -> password === $verifyPassword){
            return true;
        }
        /* return passwordverify($this -> password, $verifyPassword); */
    }
}
?>
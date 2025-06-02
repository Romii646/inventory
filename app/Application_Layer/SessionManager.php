<?php
// Created by Aaron C.
// Date: 05/31/2025
require "../Utility/word_bank.php";
require $SessionFile;
session_start();
class SessionManager {
    private $session;

    function setSessionInfo($employeeInfo){// Set session information based on employee data
        $this -> session = new Session(
            $employeeInfo['employeeID'],
            $employeeInfo['firstName'],
            $employeeInfo['employeeType'],
        );
        return setSession();
    }

    private function setSession(){
        if(!empty($this -> employee)){
            $_SESSION['employeeID'] = $this -> session -> getEmployeeID();
            $_SESSION['firstName'] = $this -> session -> getFirstName();
            $_SESSION['employeeType'] = $this -> session -> getEmployeeType();
            return true; // session set successfully
        }
        else return false; // no employee found to set session
    }

    function getSessionData(): array{
        try{
            header('content-type: application/json');
            if(!isset($_SESSION['employeeID'])) {
                http__response_code(401);
                return ['error' => 'Session expired or not logged in'];
            }

            if (!isset($_SESSION['firstName']) || !isset($_SESSION['employeeType'])) {
                http_response_code(500);
                return ['error' => 'Incomplete session data'];
            }

            return [
                'employeeID' => $_SESSION['employeeID'] ?? null,
                'firstName' => $_SESSION['firstName'] ?? null,
                'employeeType' => $_SESSION['employeeType'] ?? null,
            ];
        }
        catch (Exception $e) {
            http_response_code(500);
            return ['error' => 'Session error: ' . $e->getMessage()];
        }
    }
}
?>
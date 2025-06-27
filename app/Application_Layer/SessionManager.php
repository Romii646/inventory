<?php
// Created by Aaron C.
// Date: 05/31/2025
require_once "../Utility/word_bank.php";
require $sessionFile;

class SessionManager {
    private $session;

    function setSessionInfo($employeeInfo) {
        try {
            $this->session = new Session(
                $employeeInfo['employeeID'],
                $employeeInfo['firstName'],
                $employeeInfo['employeeType']
            );
            $result = $this->setSession();
            if ($result) {
                writeLog("Session set for employeeID: " . $employeeInfo['employeeID'], 'security', 'INFO');
            } else {
                writeLog("Failed to set session for employeeID: " . $employeeInfo['employeeID'], 'security', 'ERROR');
            }
            return $result;
        } catch (Exception $e) {
            writeLog("Error in setSessionInfo: " . $e->getMessage(), 'security', 'ERROR');
            return false;
        }
    }

    private function setSession() {
        if (!empty($this->session)) {
            $_SESSION['employeeID'] = $this->session->getEmployeeID();
            $_SESSION['firstName'] = $this->session->getFirstName();
            $_SESSION['employeeType'] = $this->session->getEmployeeType();
            return true; // session set successfully
        } else {
            writeLog("No employee data found to set session.", 'security', 'ERROR');
            return false; // no employee found to set session
        }
    }

    function getSessionData(): array {
        try {
            header('Content-Type: application/json');
            if (!isset($_SESSION['employeeID'])) {
                http_response_code(401);
                writeLog("Session expired or not logged in.", 'security', 'INFO');
                return ['error' => 'Session expired or not logged in'];
            }

            if (!isset($_SESSION['firstName']) || !isset($_SESSION['employeeType'])) {
                http_response_code(500);
                writeLog("Incomplete session data for employeeID: " . ($_SESSION['employeeID'] ?? 'unknown'), 'security', 'ERROR');
                return ['error' => 'Incomplete session data'];
            }

            writeLog("Session data retrieved for employeeID: " . $_SESSION['employeeID'], 'security', 'INFO');
            return [
                'employeeID' => $_SESSION['employeeID'] ?? null,
                'firstName' => $_SESSION['firstName'] ?? null,
                'employeeType' => $_SESSION['employeeType'] ?? null,
            ];
        } catch (Exception $e) {
            http_response_code(500);
            writeLog("Session error: " . $e->getMessage(), 'security', 'ERROR');
            return ['error' => 'Session error: ' . $e->getMessage()];
        }
    }
}
?>
<?php
    session_start();
    require 'word_bank.php';
    header('content-type: application/json');
    if (!isset($_SESSION['employeeID'])) {
        http_response_code(401);// Unauthorized
        echo json_encode([
            'error' => 'Session expired or not logged in.',
        ]);
        exit;
    }
    else
    {
        echo json_encode([
            'employeeID' => $_SESSION['employeeID'] ?? null,
            'firstName' => $_SESSION['firstName'] ?? null,
            'employeeType' => $_SESSION['employeeType'] ?? null,
        ]);
    }
?> 
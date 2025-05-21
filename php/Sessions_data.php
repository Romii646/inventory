<?php
    session_start();
    require 'word_bank.php';
    header('content-type: application/json');
    echo json_encode([
        'employeeID' => $_SESSION['employeeID'] ?? null,
        'firstName' => $_SESSION['firstName'] ?? null,
    ]);
?>
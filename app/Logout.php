<?php
// Created on 05/21/2025
    session_start();

    $_SESSION = array(); // Clear all session variables
    session_destroy(); // Destroy the session

    header('location: ../public/LoginPage.html'); // Redirect to the login page
    exit();
?>
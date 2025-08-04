<?php
/**
 * Rental Manager Class
 * 
 * @author Aaron C.
 * @date 06/01/2025
 */
session_start();
$route = $_GET['router'] ?? '';
$method = strtolower($_SERVER['REQUEST_METHOD']);

require '../Utility/word_bank.php';
require $loginControllerFile;
require $rentalControllerFile;
require $sessionControllerFile;
require $customerControllerFile;

if($method === 'post' && $route === 'login'){
    (new LoginController()) -> handleVerifyLogin($_POST);
}
else if($method === 'post' && $route === 'rentalSubmission'){// change this file name to SessionRouter and remove customer controller and rental controller this will increase better organization and not clutter different routes with one router
    (new RentalManager()) -> processRentalRequest($_POST);
}
else if (($method === 'post' || $method === 'get') && $route === 'grabSession'){
    (new SessionController()) -> handleGetSessionData();
}
else if($method === 'post' && $route === 'customerRegistration')
    (new customerController()) -> handleRegisterCustomer();
else{
    http_response_code(404);
    echo 'Route not found';
}
?>
<?php
/**
 * Rental Manager Class
 * 
 * @author Aaron C.
 * @date 06/01/2025
 */
session_start();
/* ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
ini_set('log_errors', 1);
error_reporting(E_ALL); */
$route = $_GET['router'] ?? '';
$method = strtolower($_SERVER['REQUEST_METHOD']);

require '../Utility/word_bank.php';
require $loginControllerFile;
require $rentalControllerFile;
require $sessionControllerFile;

if($method === 'post' && $route === 'login'){
    (new LoginController()) -> handleVerifyLogin($_POST);
}
else if($method === 'post' && $route === 'rentalSubmission'){
    (new RentalManager()) -> processRentalRequest($_POST);
}
else if (($method === 'post' || $method === 'get') && $route === 'grabSession'){
    (new SessionController()) -> handleGetSessionData();
}
else{
    http_response_code(404);
    echo 'Route not found';
}

?>
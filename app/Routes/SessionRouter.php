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
require $sessionControllerFile;


if($method === 'post' && $route === 'login'){
    (new LoginController()) -> handleVerifyLogin($_POST);
}
else if (($method === 'post' || $method === 'get') && $route === 'grabSession'){
    (new SessionController()) -> handleGetSessionData();
}
else{
    http_response_code(404);
    echo 'Route not found';
}
?>
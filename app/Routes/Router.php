<?php
/**
 * Rental Manager Class
 * 
 * @author Aaron C.
 * @date 06/01/2025
 */

$route = $_GET['router'] ?? '';
$method = $_SERVER['REQUEST_METHOD'];

require '../Utility/word_bank.php';
require $loginControllerFile;
require $rentalControllerFile;

if($method === 'post' && $route === 'login'){
    (new LoginController()) -> handleVerifyLogin($_POST);
}
else if($method === 'post' && $route === 'rentalSubmission'){
    (new RenalManager()) -> processRentalRequest($_POST);
}
else if ($method === 'post' && $route === 'grabSession'){
    (new SessionController()) -> handleGetSessionData();
}
else{
    http_response_code(404);
    echo 'Route not found';
}

?>
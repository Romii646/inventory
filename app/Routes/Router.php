<?php
/**
 * Rental Manager Class
 * 
 * @author Aaron C.
 * @date 02/01/2026
 */
session_start();
$route = $_GET['router'] ?? '';
$method = strtolower($_SERVER['REQUEST_METHOD']);

require '../Utility/word_bank.php';
require $rentalControllerFile;
require $customerControllerFile;


if($method === 'post' && $route === 'rentalSubmission'){
    (new RentalManager()) -> processRentalRequest($_POST);
} 
else if ($method === 'post' && $route === 'customerRegistration'){
    $raw = file_get_contents('php://input');
    checkBody($raw);
    $payload = json_decode($raw, true);
    checkJsonConversion();
    (new customerController()) -> handleRegisterCustomer($payload);
}
else{
    http_response_code(404);
    echo 'Route not found';
}

function checkBody($raw) {
    if(empty($raw)){
        http_response_code(400);
        echo json_encode(['error' =>'empty body']);
        exit;
    }
}
function checkJsonConversion() {
    if(json_last_error() !== JSON_ERROR_NONE){
        http_response_code(400);
        echo json_encode(['error' =>'invalid json', 'detail' => json_last_error_msg()]);
        exit;   
    }   
}
?>
<?php
/**
 * Customer Controller
 * 
 * @author Aaron C.
 * @date 05/31/2025
 */

require_once '../Utility/word_bank.php';
require_once $customerManagerFile;
require_once $customerFile;

class customerController {
    private $customerManager;

    function __construct(){
        $this->customerManager = new CustomerManager();
    }

    function handleRegisterCustomer($post) {
        header('Content-Type: application/json');
        try {
            $validatedPost = $this->validateSanitize($post);

            if(isset($validatedPost['failed']) && $validatedPost['failed'] === false){
                writeLog("Customer registration failed validation: " . $validatedPost['message'], 'customer', 'ERROR');
                http_response_code(400);
                echo json_encode(['error' => $validatedPost['message']]);
                exit();
            }

            $result = $this->customerManager->registerCustomer($validatedPost);

            if ($result) {
                writeLog("Customer registered: " . json_encode($validatedPost), 'customer', 'INFO');
                echo json_encode(['success' => true, 'customerID' => $result]);
            } else {
                writeLog("Customer registration failed for: " . json_encode($validatedPost), 'customer', 'ERROR');
                http_response_code(500);
                echo json_encode(['error' => 'Customer registration failed.']);
            }
        } catch (Exception $e) {
            writeLog("Exception in handleRegisterCustomer: " . $e->getMessage(), 'customer', 'ERROR');
            http_response_code(500);
            echo json_encode(['error' => 'Internal server error.']);
        }
    }

    private function validateSanitize($post): array {
        $firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_SPECIAL_CHARS);
        $lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $bNumber = filter_input(INPUT_POST, 'bNumber', FILTER_SANITIZE_SPECIAL_CHARS);
        $joinDate = filter_input(INPUT_POST, 'joinDate', FILTER_SANITIZE_SPECIAL_CHARS);

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return [
                'failed' => false,
                'message' => 'Invalid email. Please hit the back button and try again.'
            ];
        }

        return [
            'firstName' => $firstName,
            'lastName' => $lastName,
            'email' => $email,
            'bNumber' => $bNumber,
            'joinDate' => $joinDate
        ];
    }
    
    function handleDeleteCustomer($post){
        header('Content-Type: application/json');
        try {
            $result = $this->customerManager->deleteCustomer($post['customerID'] ?? null);
            if ($result) {
                writeLog("Customer deleted: " . ($post['customerID'] ?? 'unknown'), 'customer', 'INFO');
                echo json_encode(['success' => true]);
            } else {
                writeLog("Customer deletion failed for ID: " . ($post['customerID'] ?? 'unknown'), 'customer', 'ERROR');
                http_response_code(500);
                echo json_encode(['error' => 'Customer deletion failed.']);
            }
        } catch (Exception $e) {
            writeLog("Exception in handleDeleteCustomer: " . $e->getMessage(), 'customer', 'ERROR');
            http_response_code(500);
            echo json_encode(['error' => 'Internal server error.']);
        }
    }
}
?>
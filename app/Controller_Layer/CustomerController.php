<?php
/**
 * Logging Configuration
 * 
 * @author Aaron C.
 * @date 05/31/2025
 */

require '../Utility/word_bank.php';
require_once $cusotmerManager;
require_once $customerFile;

class customerController {
    private $customerManager;

    function __construct(){
        $this -> customerManager = new CustomerManager();
    }

    function handleRegisterCustomer($post) {
      $validatedPost = validateSanitize($post);

      if(!$validatedPost['failed']){
        echo $validatedPost['message'];
        exit();
      }

      $result = $this -> customerManager -> registerCustomer($validatedPost);
      
      echo json_encode($result);
    }

    private function validateSanitize($post): array {
      $firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_SPECIAL_CHAR);
      $lastNAme = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_SPECIAL_CHAR);
      $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
      $bNumber = filter_input(INPUT_POST, 'bNumber', FILTER_SANITIZE_SPECIAL_CHAR);
      $joinDate = filter_input(INPUT_POST, 'joinDate', FILTER_SANITIZE_SPECIAL_CHAR);

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
      $this -> customerManager -> deleteCustomer($post);
    }
}
?>
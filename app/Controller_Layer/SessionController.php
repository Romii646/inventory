<?php
/**
 * Rental Manager Class
 * 
 * @author Aaron C.
 * @date 06/01/2025
 */

 require_once '../Utility/word_bank.php';
 require_once $sessionManagerFile;
 require_once $sessionFile;
 

 class SessionController {
   private $sessionManager;

    function __construct(){
      $this -> sessionManager = new SessionManager();
    }

    function handleSetSession($data){
      if($this -> sessionManager -> setSessionInfo($data)){
        echo 'Session successfully set.';
      }
      else{
        echo 'Session set failed.';
      }
    }

    function handleGetSessionData(){
      header('Content-Type: application/json');
      try {
          $result = $this-> sessionManager-> getSessionData();
          echo json_encode($result);
          writeLog("Session log in for " . json_encode($result), 'security', 'LoginAttempt');
      } catch (Exception $e) {
          writeLog("Error in handleGetSessionData: " . $e-> getMessage(), 'errors', 'ERROR');
          http_response_code(500);
          echo json_encode(['error' => 'An internal error occurred.']);
      }
      exit();
    }
 }
?>
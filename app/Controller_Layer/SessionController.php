<?php
/**
 * Session Controller Class
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
        $this->sessionManager = new SessionManager();
    }

    function handleSetSession($data){
        try {
            if($this->sessionManager->setSessionInfo($data)){
                writeLog('Session successfully set for: ' . json_encode($data), 'session', 'INFO');
                return true;
            } else {
                writeLog('Session set failed for: ' . json_encode($data), 'session', 'WARNING');
                return false;
            }
        } catch (Exception $e) {
            writeLog('Exception in handleSetSession: ' . $e->getMessage(), 'session', 'ERROR');
            return false;
        }
    }

    function handleGetSessionData(){
        header('Content-Type: application/json');
        try {
            $result = $this->sessionManager->getSessionData();
            writeLog("Session data retrieved: " . json_encode($result), 'session', 'INFO');
            echo json_encode($result);
        } catch (Exception $e) {
            writeLog("Error in handleGetSessionData: " . $e->getMessage(), 'errors', 'ERROR');
            http_response_code(500);
            echo json_encode(['error' => 'An internal error occurred.']);
        }
        exit();
    }
}
?>
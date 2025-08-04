<?php
/**
 * Rental Manager Class
 * 
 * @author Aaron C.
 * @date 06/01/2025
 */

require_once '../Utility/word_bank.php';
require_once $employeeManagerFile;
require_once $employeeFile;
require_once $sessionManagerFile;
require_once $sessionFile;

class LoginController {
    private $employeeManager;
    private $sessionManager;

    function __construct(){
        $this -> employeeManager = new EmployeeManager();
        $this -> sessionManager = new SessionManager();
    }

    function handleVerifyLogin($post){
        $pattern = '/^EMP[0-9]{5}$/';
        $employeeInfo = [];
        $error = 0;
        $employeeID = $post['employeeID'];
        $givenPassword = $post['password'];
        try{
            if(preg_match($pattern, $employeeID)){
                if($this -> employeeManager -> verifyLogin($employeeID, $givenPassword)){
                    $employeeInfo = $this -> employeeManager -> retrieveCredential(); 
                    writeLog("Login successful for employeeID: $employeeID", 'login', 'INFO');
                }
                else{
                    writeLog("Login failed: Incorrect password for employeeID: $employeeID", 'login', 'WARNING');
                    $error++;
                }
            }
            else{
                writeLog("Login failed: Invalid employeeID format: $employeeID", 'login', 'WARNING');
                $error++; 
            }

            if($error > 0){
                http_response_code(401);
                return;
            }

            if($this -> sessionManager -> setSessionInfo($employeeInfo)){
                writeLog("Session setup successful for employeeID: $employeeID", 'login', 'INFO');
                header("Location: /inventory/inventory/public/homePage.html"); 
                exit();
            }
            else{
                writeLog("Session setup failed for employeeID: $employeeID", 'login', 'ERROR');
                http_response_code(500);
                return;
            }

        }
        catch(Exception $e){
            writeLog("Exception in handleVerifyLogin: " . $e->getMessage(), 'errors', 'ERROR');
            http_response_code(500);
            return;
        }
    }
}
?>
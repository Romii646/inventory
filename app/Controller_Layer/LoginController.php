<?php
/**
 * Rental Manager Class
 * 
 * @author Aaron C.
 * @date 06/01/2025
 */

require '../Utility/word_bank.php';
require_once $employeeManagerFile;
require_once $employeeFile;
require_once $sessionManagerFile;
require_once $sessionFile;
require_once $configurationFile;

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
        $givenPassword = $post['pasword'];
        try{
            if(preg_match($pattern, $employeeID)){
                if($this -> employeeManager -> verifyLogin($employeeID, $givenPassword)){
                    $employeeInfo = $this -> retrieveCredential(); 
                }
                else{
                    echo '<p>Password is incorrect</p>';
                    $error++;
                }
            }
            else{
                echo '<p>Incorrect input for employeeID field</p>';
                $error++; 
            }

            if($error > 0){
                echo '<p>Please hit the back button and try again</p>';
                exit();
            }

            if($this -> sessionManager -> setSessionInfo($employeeInfo)){
                header("Location: ../homePage.html"); 
                exit();
            }
            else{
                echo '<p>Session setup failed, please hit the back button and try again</p>';
                exit();
            }

        }
        catch(Exception $e){
            echo '</p>An error has occured, please notify DBA or WEB administrator</p>';
            writeLog("Error in function handleVerifyLogin: " . $e->getMessage(), 'errors', 'ERROR');
            exit();
        }
    }
}
?>
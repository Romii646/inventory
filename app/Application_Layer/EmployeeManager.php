<?php
/**
 * Employee Manager Class
 * 
 * @author Aaron C.
 * @date 05/30/2025
 */
require_once "../Utility/word_bank.php";
require $SQLOperationFile;
require $employeeFile;
class EmployeeManager extends SQLOp {
    private $employee;

    // Function to verify login credentials
    function verifyLogin($inputEmployeeID, $inputPassword){
        try {
            $this->connect();
            $this->SQLstring = "SELECT * FROM employees WHERE employee_id = :employee_id";
            $this->statement = $this->conn->prepare($this->SQLstring);
            $this->statement->bindParam(':employee_id', $inputEmployeeID);
            $this->statement->execute();

            if ($this->statement->rowCount() > 0) {
                $row = $this->statement->fetch(PDO::FETCH_ASSOC);
                $this->employee = new Employee(
                    $row['employee_id'],
                    $row['password'],
                    $row['first_name'],
                    $row['employee_type']
                );
                if (!$this->employee->verifyPassword($inputPassword)) {
                    $this->DB_close();
                    writeLog("Login failed: password mismatch for employee_id $inputEmployeeID", 'employee', 'INFO');
                    return false;
                }
            } else {
                $this->DB_close();
                writeLog("Login failed: employee_id $inputEmployeeID not found", 'employee', 'INFO');
                return false;
            }
            $this->DB_close();
            writeLog("Login successful for employee_id $inputEmployeeID", 'employee', 'INFO');
            return true;
        } catch (Exception $e) {
            writeLog("Error in verifyLogin: " . $e->getMessage(), 'employee', 'ERROR');
            if (method_exists($this, 'DB_close')) {
                $this->DB_close();
            }
            return false;
        }
    }

    // retrieve credentials for session login
    function retrieveCredential(){
        try {
            if (!empty($this->employee)) {
                return [
                    'employeeID' => $this->employee->getEmployeeID(),
                    'firstName' => $this->employee->getFirstName(),
                    'employeeType' => $this->employee->getEmployeeType()
                ];
            }
            return null;
        } catch (Exception $e) {
            writeLog("Error in retrieveCredential: " . $e->getMessage(), 'employee', 'ERROR');
            return null;
        }
    }

    // Function to register a new employee
    function registerEmployee($firstName, $password, $employeeType){
        try {
            $hashPassword = password_hash($password, PASSWORD_DEFAULT);
            $this->SQLstring = "INSERT INTO employees (first_name, password, employee_type) VALUES (:first_name, :password, :employee_type)";
            $this->statement = $this->conn->prepare($this->SQLstring);
            $this->statement->bindParam(':first_name', $firstName);
            $this->statement->bindParam(':password', $hashPassword);
            $this->statement->bindParam(':employee_type', $employeeType);
            $result = $this->statement->execute();
            if ($result) {
                writeLog("Employee registered: $firstName, $employeeType", 'employee', 'INFO');
            } else {
                writeLog("Employee registration failed: $firstName, $employeeType", 'employee', 'ERROR');
            }
            return $result;
        } catch (Exception $e) {
            writeLog("Error in registerEmployee: " . $e->getMessage(), 'employee', 'ERROR');
            return false;
        }
    }
}
?>
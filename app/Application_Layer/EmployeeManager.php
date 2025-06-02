<?php
/**
 * Employee Manager Class
 * 
 * @author Aaron C.
 * @date 05/30/2025
 */
require "../Utility/word_bank.php";
require $EmployeeFile;
class EmployeeManager extends SQLOp {
    private $employee;
    // Function to verify login credentials
    // This function will check if the employeeID and password match any record in the databasE
    function verifyLogin($inputEmployeeID, $inputPassword){
        $this -> SQLstring = "SELECT * FROM employees WHERE employee_id = :employee_id";
        $this -> statement = $this -> conn -> prepare($this -> SQLstring);
        $this -> statement -> bindParam(':employee_id', $inputEmployeeID);
        $this -> statement -> execute();

        if($this -> statement -> rowCount() > 0){
            $row = $this -> statement -> fetch(PDO::FETCH_ASSOC);// fetch the row
            $this -> employee = new Employee(
                $row['employeeID'],
                $row['password'],
                $row['firstName'],
                $row['employeeType']
            );
            if(!$employee -> verifyPassword($inputPassword)){
                return false; // password does not match
                DB_close();
            }
        } else {
            return false; // no employee found with the given employeeID
            DB_close();
        }
        DB_close();
        return true; // returns true if password matches
    }
    // retrieve credentials for session login
    function retrieveCredential(){
        if(!empty($this -> employee)){
            return [
                'employeeID' => $this -> employee -> getEmployeeID(),
                'firstName' => $this -> employee -> getFirstName(),
                'employeeType' => $this -> employee -> getEmployeeType()
            ];
        }
        return null; // no employee found
    }

    // Function to register a new employee
    // This function will hash the password before storing it in the database
    function registerEmployee(){
        $hashPassword = password_hash($this -> password, PASSWORD_DEFAULT); // hash the password
        $this -> SQLstring = "INSERT INTO employees (first_name, password, employee_type) VALUES (:first_name, :password, :employee_type)";
        $this -> statement = $this -> conn -> prepare($this -> SQLstring);
        $this -> statement -> bindParam(':first_name', $this -> firstName);
        $this -> statement -> bindParam(':password', $hashPassword);
        $this -> statement -> bindParam(':employee_type', $this -> employeeType);
        return $this -> statement -> execute(); // this will return true if the insert was successful
    }
}
?>
<?php
session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Intern Login</title>
</head>
<body>
    <?php
        require 'Utility/word_bank.php';
        require $errorFunctionsFile;
        require $EmployeeFile;

        $error = 0;
        if(isset($_POST['login'])){            
            $employeeID = $_POST['employeeID'];
            $password = $_POST['password'];
            $employee = new Employee($employeeID, $password);
        }
        else{
            echo "<p>Invalid form submission.</p>";
            ++$error;
        }

        if($error == 0){
            $employee -> connect();
            if($employee -> verifyLogin()){            
                // Set session variables
                $_SESSION['employeeID'] = $employee->getEmployeeID();
                $_SESSION['firstName'] = $employee->getFirstName();
                $_SESSION['employeeType'] = $employee->getEmployeeType();
                $employee -> DB_close();
                header("Location: ../homePage.html"); 
                exit();
            }
            else{
                echo "<p>Either your employee ID or password was not found.</p>";
                ++$error;
            }
        }
        if($error > 0){
            echo "Please hit the back button and try again.</p>";
            exit();
        }
    ?>
</body>
</html>
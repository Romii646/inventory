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
        require 'word_bank.php';
        require $errorFunctionsFile;
        require $EmployeeFile;

        $error = 0;
        if(isset($_POST['loginForm'])){            
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
                /* $employeeID = $employee -> getEmployeeID(); */
                $firstName = $employee -> getFirstName();
                $employeeType = $employee -> getEmployeeType();

                // Set session variables
                /* $_SESSION['employeeID'] = $employeeID; */
                $_SESSION['firstName'] = $firstName;
                $_SESSION['employeeType'] = $employeeType;
                header("Location: ../homePage.html"); // Redirect to the home page the ../ means go up one directory
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
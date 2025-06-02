<?php
// Created by Aaron C. 10/08/2024 updated on 05/31/2025

// External file listing
$databaseFile = '../Database/database.php';
$SQLGeneratorFile = '../Utility/SQL_statement_generator.php';
$SQLOperationFile = '../SQL_Operation_Layer/database_operations.php';
$errorFunctionsFile = '../Utility/validate_error_functions.php';
$configurationFile = '../configuration/config_logging.php';


//plain class group
$employeeFile = '../Domain_Layer/Employee.php';
$rentalFile = '../Domain_Layer/Rental.php';
$itemFile = '../Domain_Layer/Item.php';
$customerFile = '../Domain_Layer/Customer.php';
$sessionFile = '../Domain_Layer/Session.php';


//manager class file group
$rentalManagerFile = '../Application_Layer/RentalManager.php';
$employeeManagerFile = '../Application_Layer/EmployeeManager.php';
$sessionManagerFile = '../Apllication_Layer/SessionManager.php';
$customerManagerFile = '../Aplication_Layer/CustomerManager.php';

//controller class file group
$loginControllerFile = '../Controller_Layer/EmployeeManager.php';
$rentalControllerFile = '../Controller_Layer/rentalManager.php';

 //if (!function_exists('find_ID')) {
    /**
     * Finds the primary key name of the table.
     * 
     * @param string $table_name Name of the table.
     * @return string Primary key name.
     */
   //function find_ID($table_name) {
    // Array of table names and their corresponding primary key names
    /*    $idArray = [// for every new table created, add the table name and its primary key name here.
         "accessories" => "acc_id",
         "graphicscards" => "gpu_id",
         "keyboards" => "kb_id",
         "mice" => "mouse_id",
         "monitors" => "monitor_id",
         "motherboards" => "mobo_id",
         "pcsetups" => "pc_id",
         "powersupplies" => "psu_id",
         "ramsticks" => "ram_id"
                     ];
          return $idArray[$table_name];
      }
} */
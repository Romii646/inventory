<?php
// Created by Aaron C. 10/08/2024 updated on 02/12/2025

// External file listing
   $databaseFile = 'database.php';
   $SQLGeneratorFile = "SQL_statement_generator.php";
   $SQLOperationFile = 'database_operations.php';
   $errorFunctionsFile = 'validate_error_functions.php';

 if (!function_exists('find_ID')) {
    /**
     * Finds the primary key name of the table.
     * 
     * @param string $table_name Name of the table.
     * @return string Primary key name.
     */
   function find_ID($table_name) {
    // Array of table names and their corresponding primary key names
       $idArray = [
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
}
<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Other form process page</title>
</head>
<body>
    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // Start of form processing for keyboard page
    // Variable list and require list
    require 'word_bank.php';
    require $SQLOperationFile;
    require $errorFunctionsFile;

    // Start of main program
    if(isset($_POST['form'])){// Check if form data is received
        $form = $_POST['form'];
    }
    else if(isset($_GET['form'])){// Check if form data is received
        $form = $_GET['form'];
    }

    // this variable is used to look up the datas bases corresponding table name from _POST globals and declared in a variable, and to be a condition in a if else or loop.
    $tableKeyName = 'tableSelect'; 

    switch($form){
        case 'form1':
            $insertOP = new insertOp(); // Class object for inserting data
            $columnValues = [];
            $columnNames = [];
            $count = 0;

            // Start of assigning variables to POST values
            foreach($_POST as $post => $values){
                if($post != "form" &&  $post != $tableKeyName && !empty($values)){
                    $columnValues[$count] = validate_input($values, $post);
                    if($post == "cost"){
                        if (!is_numeric($columnValues[$count])) {
                            ++$errorCount;
                            echo "The value for cost is not numeric. Error count: \"$errorCount\"<br>";
                            $columnValues[$count] = null;
                        } 
                        else {
                            $columnValues[$count] = (float)$columnValues[$count];
                        }
                    }
                    if($post != "p_id"){// change this value if the primary ID tags are different.
                        $columnNames[$count] = $post;
                    }
                    $count++;
                }
            }
            $table_name = validate_input($_POST[$tableKeyName], "Table name");
            error_log("Parameters values: " . print_r($columnValues, true));
            error_log("Parameters names: " . print_r($columnNames, true));
            error_log("table name is: " . $table_name);
            // End of assigning variable to POST values
            if($errorCount == 0) {
                //$idName = find_ID($table_name);//goes to word_bank.php
                $insertOP -> connect();
                $insertOP -> set_table_names(...$columnNames);// goes to SQLOp.php
                $statement = $insertOP -> add_query($table_name, ...$columnValues);// goes to SQLOp.php
                $insertOP -> execute_query($statement);// goes to SQLOp.php
                header("Location: ../inventoryForm.html");
                exit();
            }
            else{
                echo "No form data received";
            }
            break;

        // View Table form ***********************************************************************
        case 'form2'://This form is no long in use due to javascript function fetchTable take control of rendering tables
            // on the homePage. This function can be used from more dominate php focused data transfers between php files
            
            $viewOp = new queryOp(); // Instantiating queryOp class for viewing data
            if(isset($_GET['table'])){
                $table_name = validate_input($_GET['table'], "view table"); // this string table is the expection to not having $tableKeyName within the POST brackets. As the view form is fairly stable and non changing
            }
            else{
                error_log("No table name received");
                ++$errorCount;
            }
            if($errorCount == 0) {
                $viewOp -> connect();
                /**
                 * Sets the table name and queries the table.
                 * 
                 * @param string $table_name Name of the table.
                 */
                $viewOp -> set_table_name($table_name);
                $viewOp -> query_table();
                $viewOp -> print_table();
                $viewOp -> DB_close();
            }
            else{
                echo "No form data received";
            }
            break;

        // Operation to update table row *********************************************************************************************************************************************************************************************************************
        case 'form3':
            // Local variables
            $updateOp = new updateOp(); // Class object for updating data
            $tableNameValues =[];

            // grabbing the table name
            $table_name = validate_input($_POST[$tableKeyName], "update table row");
            
            foreach($_POST as $post => $value){
                if($post != "form" && $post != $tableKeyName && !empty($value)){
                    $tableNameValues[$post] = validate_input($value, $post);
                }
            }
        
            if($errorCount == 0) {
                $updateOp -> connect();
                if(!empty($tableNameValues)){
                    /**
                     * Sets the table update values.
                     * 
                     * @param string $table_name Name of the table.
                     * @param array $tableNameValues Array of columns and values to update.
                     * @param int $p_id_value Primary ID value.
                     */

                    $updateOp -> set_table_update($table_name, $tableNameValues);
                }
                else{
                    echo "No values to update";
                }
                $updateOp -> update_table();
                $updateOp -> DB_close();
            }
            break;

        // Operation to delete table row ***********************************************************************
        case 'form4':
            $deleteOp = new deleteOp(); // Instantiating deleteOp class for deleting data
            $table_name = validate_input($_POST[$tableKeyName], "deleting row for keyboard table");
            $tableNameValues = [];
            foreach($_POST as $post => $value){
                if($post != "form" && $post != $tableKeyName && !empty($value)){
                    $tableNameValues[$post] = validate_input($value, $post);
                }
            }
            $nameArrayValue = array_values($tableNameValues);
            $nameArrayKey = array_keys($tableNameValues);
            $p_value = trim($nameArrayValue[0]);
            $p_id = trim($nameArrayKey[0]);
            if($errorCount == 0) {
                $deleteOp -> connect();
                /**
                 * Sets the table delete values.
                 * 
                 * @param string $table_name Name of the table.
                 * @param int $p_id Primary ID value.
                 */
                $deleteOp -> set_table_delete($table_name, $p_id, $p_value);
                $deleteOp -> delete_row();
                $deleteOp -> DB_close();
                header("Location: ../inventoryForm.html");
                exit();
            }
            break;
    }
    ?>
</body>
</html>
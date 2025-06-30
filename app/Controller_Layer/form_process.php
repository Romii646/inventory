<?php
// Start of form processing for keyboard page
require_once '../Utility/word_bank.php';
require $SQLOperationFile;
require $errorFunctionsFile;

    set_error_handler(function($errno, $errstr, $errfile, $errline) {
        writeLog("PHP Error [$errno] $errstr in $errfile on line $errline", 'errors', 'ERROR');
        return true;
    });


    set_exception_handler(function($exception) {
        writeLog("Uncaught Exception: " . $exception->getMessage(), 'errors', 'ERROR');
    });

    $errorCount = 0;
    $tableKeyName = 'tableSelect';

    try {
        if(isset($_POST['form'])){
            $form = $_POST['form'];
        } else if(isset($_GET['form'])){
            $form = $_GET['form'];
        } else {
            writeLog("No form identifier received in POST or GET.", 'errors', 'ERROR');
            throw new Exception("Form identifier missing.");
        }

        switch($form){
            case 'form1':
                $insertOP = new insertOp();
                $columnValues = [];
                $columnNames = [];
                $count = 0;

                foreach($_POST as $post => $values){
                    if($post != "form" &&  $post != $tableKeyName && !empty($values)){
                        $columnValues[$count] = validate_input($values, $post);
                        if($post == "cost"){
                            if (!is_numeric($columnValues[$count])) {
                                ++$errorCount;
                                writeLog("Non-numeric cost value: " . $columnValues[$count], 'errors', 'WARNING');
                                $columnValues[$count] = null;
                            } else {
                                $columnValues[$count] = (float)$columnValues[$count];
                            }
                        }
                        if($post != "p_id"){
                            $columnNames[$count] = $post;
                        }
                        $count++;
                    }
                }
                $table_name = validate_input($_POST[$tableKeyName], "Table name");
                writeLog("Insert attempt: table=$table_name, columns=" . json_encode($columnNames) . ", values=" . json_encode($columnValues), 'database', 'INFO');
                if($errorCount == 0) {
                    $insertOP -> connect();
                    $insertOP -> set_table_names(...$columnNames);
                    $statement = $insertOP -> add_query($table_name, ...$columnValues);
                    $insertOP -> execute_query($statement);
                    writeLog("Insert operation successful for table: $table_name", 'database', 'INFO');
                    header("Location: ../inventoryForm.html");
                    exit();
                } else {
                    writeLog("Insert operation failed due to error count for table: $table_name", 'errors', 'ERROR');
                }
                break;

            case 'form2':
                $viewOp = new queryOp();
                if(isset($_GET['table'])){
                    $table_name = validate_input($_GET['table'], "view table");
                } else {
                    writeLog("No table name received in form2", 'errors', 'ERROR');
                    ++$errorCount;
                }
                if($errorCount == 0) {
                    $viewOp -> connect();
                    $viewOp -> set_table_name($table_name);
                    $viewOp -> query_table();
                    $viewOp -> print_table();
                    $viewOp -> DB_close();
                    writeLog("View operation successful for table: $table_name", 'database', 'INFO');
                } else {
                    writeLog("View operation failed due to error count", 'errors', 'ERROR');
                }
                break;

            case 'form3':
                $updateOp = new updateOp();
                $tableNameValues =[];
                $table_name = validate_input($_POST[$tableKeyName], "update table row");

                foreach($_POST as $post => $value){
                    if($post != "form" && $post != $tableKeyName && !empty($value)){
                        $tableNameValues[$post] = validate_input($value, $post);
                    }
                }

                writeLog("Update attempt: table=$table_name, values=" . json_encode($tableNameValues), 'database', 'INFO');
                if($errorCount == 0) {
                    $updateOp -> connect();
                    if(!empty($tableNameValues)){
                        $updateOp -> set_table_update($table_name, $tableNameValues);
                    } else {
                        writeLog("No values to update in form3 for table: $table_name", 'errors', 'WARNING');
                    }
                    $updateOp -> update_table();
                    $updateOp -> DB_close();
                    writeLog("Update operation successful for table: $table_name", 'database', 'INFO');
                } else {
                    writeLog("Update operation failed due to error count for table: $table_name", 'errors', 'ERROR');
                }
                break;

            case 'form4':
                $deleteOp = new deleteOp();
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
                writeLog("Delete attempt: table=$table_name, p_id=$p_id, p_value=$p_value", 'database', 'INFO');
                if($errorCount == 0) {
                    $deleteOp -> connect();
                    $deleteOp -> set_table_delete($table_name, $p_id, $p_value);
                    $deleteOp -> delete_row();
                    $deleteOp -> DB_close();
                    writeLog("Delete operation successful for table: $table_name, p_id: $p_id, p_value: $p_value", 'database', 'INFO');
                    header("Location: ../inventoryForm.html");
                    exit();
                } else {
                    writeLog("Delete operation failed due to error count for table: $table_name", 'errors', 'ERROR');
                }
                break;
        }
    } catch (Exception $e) {
        writeLog("Exception in form_process.php: " . $e->getMessage(), 'errors', 'ERROR');
    }
    ?>
</body>
</html>
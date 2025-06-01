<?php
// created by Aaron C. 1/20/2025
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);
ini_set('log_errors', 1);
ini_set('error_log', 'C:/xampp/htdocs/inventory/php-error.log'); // Update this path to a writable location
require '../Utility/word_bank.php';
include $SQLOperationFile;

header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-cache, no-store, must-revalidate');

$modeSet = $_GET['action'];
$pcSetUpObj = new pcSetUp();

// used to decode JSON objects in cyberScript.js.
// the modeSet variable is used to decided which switch expression to fall into.
// this file is associated with class pcSetUp in the SQLOp.php file.
try {
    switch($modeSet) {
        // view is used to display the table data in the pcSetUp table.
        case 'view':
            $tableName = file_get_contents('php://input');// used to get the table name from the client side.
            $pcSetUpObj -> connect();
            $pcSetUpObj -> set_table_name($tableName);
            $result = $pcSetUpObj ->view_table();
            if (empty($result)) {
                error_log('Message: No data available');
            } else {
                echo json_encode($result);
            }
            $pcSetUpObj ->DB_close();
            break;
        case 'add':
            // used to add a row to the pcSetUp table.
            $input = json_decode(file_get_contents('php://input'), true);
            $pcSetUpObj -> connect();
            try {
                $pcSetUpObj->add_row(
                    $input['pc_id'],
                    $input['mobo_id'],
                    $input['gpu_id'],
                    $input['ram_id'],
                    $input['storage_slot_id'],
                    $input['psu_id'],
                    $input['monitor_id'],
                    $input['acc_id'],
                    $input['kb_id'],
                    $input['mouse_id'],
                    $input['tableLocation'],
                    $input['PCcondition']
                );
                echo json_encode(['message' => 'Row added successfully']);
            } catch (Exception $e) {
                echo json_encode(['error' => 'Failed to add row: ' . $e->getMessage()]);
                error_log('Failed to add row: ' . $e->getMessage());
            }
            $pcSetUpObj ->DB_close();
            break;
        case 'update':
            // used to update a row in the pcSetUp table.
            $input = json_decode(file_get_contents('php://input'), true);
            $updateArray = [];
            foreach($input as $inputKey => $value){
                if(!empty($value) && $inputKey != 'pc_id'){
                    $updateArray[$inputKey] = $value; 
                }
            }
            $pcSetUpObj -> connect();
            $pcSetUpObj->update_row($updateArray, $input['pc_id']);
            $pcSetUpObj ->DB_close();
            echo json_encode(['message' => 'Row updated successfully']);
            break;
        case 'delete':
            // used to delete a row in the pcSetUp table.
            $input = json_decode(file_get_contents('php://input'), true);
            $stringInput = implode(" ", $input);
            $pcSetUpObj -> connect();
            $pcSetUpObj ->delete_row($stringInput);
            $pcSetUpObj ->DB_close();
            echo json_encode(['message' => 'Row deleted successfully']);
            break;
        default:
            echo json_encode(['message' => 'Invalid action']);
    }
} catch (Exception $e) { 
    error_log('Error: ' . $e->getMessage());
    echo json_encode(['error' => 'Error: ' . $e->getMessage()]);
}
?>
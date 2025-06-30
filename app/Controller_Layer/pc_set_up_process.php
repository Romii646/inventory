<?php
// created by Aaron C. 1/20/2025

require_once '../Utility/word_bank.php';
include $SQLOperationFile;

header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-cache, no-store, must-revalidate');


set_error_handler(function($errno, $errstr, $errfile, $errline) {
    writeLog("PHP Error [$errno] $errstr in $errfile on line $errline", 'pc_set_up', 'ERROR');
    return true; 
});


set_exception_handler(function($exception) {
    writeLog("Uncaught Exception: " . $exception->getMessage(), 'pc_set_up', 'ERROR');
    echo json_encode(['error' => 'An internal error occurred.']);
    exit();
});

$modeSet = $_GET['action'] ?? null;
$pcSetUpObj = new pcSetUp();

try {
    switch($modeSet) {
        case 'view':
            $tableName = file_get_contents('php://input');
            $pcSetUpObj->connect();
            $pcSetUpObj->set_table_name($tableName);
            $result = $pcSetUpObj->view_table();
            if (empty($result)) {
                writeLog('No data available for table: ' . $tableName, 'pc_set_up', 'INFO');
                echo json_encode(['message' => 'No data available']);
            } else {
                echo json_encode($result);
            }
            $pcSetUpObj->DB_close();
            break;
        case 'add':
            $input = json_decode(file_get_contents('php://input'), true);
            $pcSetUpObj->connect();
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
                writeLog('Row added successfully: ' . json_encode($input), 'pc_set_up', 'INFO');
                echo json_encode(['message' => 'Row added successfully']);
            } catch (Exception $e) {
                writeLog('Failed to add row: ' . $e->getMessage(), 'pc_set_up', 'ERROR');
                echo json_encode(['error' => 'Failed to add row.']);
            }
            $pcSetUpObj->DB_close();
            break;
        case 'update':
            $input = json_decode(file_get_contents('php://input'), true);
            $updateArray = [];
            foreach($input as $inputKey => $value){
                if(!empty($value) && $inputKey != 'pc_id'){
                    $updateArray[$inputKey] = $value; 
                }
            }
            $pcSetUpObj->connect();
            $pcSetUpObj->update_row($updateArray, $input['pc_id']);
            $pcSetUpObj->DB_close();
            writeLog('Row updated successfully: pc_id=' . $input['pc_id'] . ', updates=' . json_encode($updateArray), 'pc_set_up', 'INFO');
            echo json_encode(['message' => 'Row updated successfully']);
            break;
        case 'delete':
            $input = json_decode(file_get_contents('php://input'), true);
            $stringInput = implode(" ", $input);
            $pcSetUpObj->connect();
            $pcSetUpObj->delete_row($stringInput);
            $pcSetUpObj->DB_close();
            writeLog('Row deleted successfully: ' . $stringInput, 'pc_set_up', 'INFO');
            echo json_encode(['message' => 'Row deleted successfully']);
            break;
        default:
            writeLog('Invalid action attempted: ' . $modeSet, 'pc_set_up', 'WARNING');
            echo json_encode(['message' => 'Invalid action']);
    }
} catch (Exception $e) { 
    writeLog('Error: ' . $e->getMessage(), 'pc_set_up', 'ERROR');
    echo json_encode(['error' => 'An internal error occurred.']);
}
?>
<?php
/**
 * Logging Configuration
 * 
 * @author Aaron C.
 * @date 05/31/2025
 */

// Base path for logs 
// SET UP TO THE SYSTEM REPORTING FEATURE
define('LOG_PATH', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'logs' . DIRECTORY_SEPARATOR);

// Create log directories if they don't exist
$logDirs = [
    LOG_PATH,
    LOG_PATH . 'database',
    LOG_PATH . 'rentals',
    LOG_PATH . 'security',
    LOG_PATH . 'errors'
];

foreach ($logDirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }
}

// Logging function
function writeLog($message, $type = 'error', $level = 'INFO') {
    $date = date('Y-m-d H:i:s');
    $logFile = LOG_PATH;
    
    switch ($type) {
        case 'rental':
            $logFile .= 'rentals/rental_operations.log';
            break;
        case 'database':
            $logFile .= 'database/database_operations.log';
            break;
        case 'customer':
            $logFile .= 'customer/customer_operations.log';
            break;
        case 'item':
            $logFile .= 'item/item_operations.log';
            break;
        default:
            $logFile .= 'errors/general_errors.log';
    }
    
    $logMessage = "[$date][$level] $message" . PHP_EOL;
    error_log($logMessage, 3, $logFile);
}
?>
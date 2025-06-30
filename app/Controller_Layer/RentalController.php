<?php
/**
 * Rental Manager Class
 * 
 * @author Aaron C.
 * @date 05/31/2025
 */

require_once '../Utility/word_bank.php';
require_once $rentalManagerFile;
require_once $rentalFile;
require_once $configurationFile;

class RentalController{
    private $rentalManager;

    function __construct(){
        $this -> rentalManager = new RentalManager();
    }

    function processRentalRequest($post): array{
        $validatedpost = $post;
        try{
            $result = $this -> rentalManager -> addRental(
                $validatedpost['object_id'],
                $validatedpost['Bnumber'],
                $validatedpost['employee_id'],
                $validatedpost['start_date'],
                $validatedpost['return_date'],
                'active',
                $validatedpost['totalPrice']
            );

            if($result){
                writeLog("Rental created successfully: rental_id=$result, data=" . json_encode($validatedpost), 'rental', 'INFO');
                return ['success' => true, 'rental_id' => $result];
            }
            writeLog("Failed to create rental entry: " . json_encode($validatedpost), 'rental', 'WARNING');
            return ['success' => false, 'message' => 'Failed to create rental entry.'];
        }
        catch(Exception $e){
            writeLog("Exception in processRentalRequest: " . $e->getMessage(), 'rental', 'ERROR');
            return ['success' => false, 'message' => 'An internal error occurred while processing the rental.'];
        }
    }
}
?>
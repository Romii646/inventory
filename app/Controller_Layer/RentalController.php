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
        //validate inputdata
        $validatedpost = $post;
        try{
            $result = $this -> rentalManager -> addRental(
                $validatedpost['object_id'],
                $validatedpost['Bnumber'],
                $validatedpost['employee_id'],
                $validatedpost['start_date'],
                $validatedpost['return_date'],
                'active',
                $validatedpost['totalPrice'],
            );

            if($result){
                return ['success' => true, 'rental_id' => $result];
            }
            return ['success' => false, 'message' => 'failed to create rental entry.'];
        }
        catch(Exception $e){
            writeLog("Failed to process new rental: " . $e->getMessage(), 'rental', 'ERROR');
            return ['success' => false, 'message' => $e->getMessage()]; 
        }
    }
}
?>
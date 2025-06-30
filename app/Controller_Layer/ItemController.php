<?php
/**
 * Item Controller class
 * 
 * @author Aaron C.
 * @date 05/31/2025
 */

require_once '/../Utility/word_bank.php';
require_once $itemManagerFile;
require_once $itemFile;

class ItemController{
    private $itemManager;

    function  __construct(){
        $this -> itemManager = new ItemManager();
    }

    function getItemDetails($objectID): array {
        try {
            $item = $this -> itemManager -> getItem($objectID);
            if ($item){
                writeLog("Item fetched successfully: objectID=$objectID", 'item', 'INFO');
                return [
                    'status' => 'success',
                    'data' => [
                        'objectID' => $item -> getObjectID(),
                        'itemID' => $item -> getItemID(),
                        'categoryType' => $item -> getcategoryType(),
                        'rentPrice' => $item -> getRentPrice()
                    ]
                ];
            }
            else {
                writeLog("Item not found: objectID=$objectID", 'item', 'WARNING');
                return [
                    'status' => 'error',
                    'message' => 'Item not found.'
                ];
            }
        }
        catch (Exception $e) {
            writeLog("Exception in getItemDetails: " . $e->getMessage(), 'item', 'ERROR');
            return [
                'status' => 'error',
                'message' => 'An internal error occurred while fetching item details.'
            ];
        }
    }

    //addItem function can be added here if needed
    //updateItem function can be added here if needed
    //deleteItem function can be added here if needed
}
?>
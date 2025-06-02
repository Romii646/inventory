<?php
/**
 * Item Controller class
 * 
 * @author Aaron C.
 * @date 05/31/2025
 */

 require '/../Utility/word_bank.php';
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
                return [
                    'status' => 'error',
                    'message' => 'Item not found.'
                ];
            }
        }
        catch (Exception $e) {
            writeLog("Failed to get Item: " . $e->getMessage(), 'item', 'ERROR');
            return [
                'status' => 'error',
                'message' => 'An error occurred: ' . $e -> getMessage()
            ];
        }
    }

    //addItem function can be added here if needed
    //updateItem function can be added here if needed
    //deleteItem function can be added here if needed
 }
?>
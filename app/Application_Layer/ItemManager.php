<?php
// Created by Aaron C.
// Date: 05/30/2025
require_once "../Utility/word_bank.php";
require $SQLOperationFile;
require $itemFile;

class ItemManager extends SQLOp {
    function getItem ($objectID) {
        $this -> SQLstring = "SELECT * FROM item WHERE object_id = :object_id";
        $this -> statement = $this -> conn -> prepare($this -> SQLstring);
        $this -> statement -> bindParam(':object_id', $objectID);
        $this -> statement -> execute();
        if($this -> statement -> rowCount() > 0) {
            $row = $this -> statement -> fetch(PDO::FETCH_ASSOC);
            return new Item (
                $row['object_id'],
                $row['item_id'],
                $row['category_type'],
                $row['rent_price']
            );
        }
        else {
            return null;
        }
    }
}
?>
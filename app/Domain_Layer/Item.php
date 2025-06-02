<?php
// Created by Aaron C.
// Date: 05/30/2025

class Item {
    private $objectID;
    private $itemID;
    private $categoryType;
    private $rentPrice;

    function __construct($objectID, $itemID, $categoryType, $rentPrice) {
        $this -> objectID = $objectID;
        $this -> itemID = $itemID;
        $this -> categoryType = $categoryType;
        $this -> rentPrice = $rentPrice;
    }

    function getObjectID() {
        return $this -> objectID;
    }
    function getItemID() {
        return $this -> itemID;
    }
    function getCategoryType() {
        return $this -> categoryType;
    }
    function getRentPrice() {
        return $this -> rentPrice;
    }
    function setObjectID($objectID) {
        $this -> objectID = $objectID;
    }
    function setItemID($itemID) {
        $this -> itemID = $itemID;
    }
    function setCategoryType($categoryType) {
        $this -> categoryType = $categoryType;
    }
    function setRentPrice($rentPrice) {
        $this -> rentPrice = $rentPrice;
    }
}
?>
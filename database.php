<?php
 class Database {
    //Created by Aaron C. 09/19/2024 Finished 09/20/2024
    // will need database info to assign variables
    private $dbName = "inventdev";
    private $user = "root";
    private $password = "";
    private $host = "localhost";
    public $conn;

    public function getConnection(){
        $this -> conn = null;

        try{
            $this -> conn = new PDO("mysql:host=" . $this -> host . ";dbname=" . $this -> dbName, $this -> user, $this -> password);
            $this -> conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $exception){
            echo "Connection error: " . $exception -> getMessage();
        }
        return $this -> conn;
    }
    public function closeDB(){
        $this -> conn = null;
    }
 }
?>
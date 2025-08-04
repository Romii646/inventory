<?php
// Created by Aaron C. 10/08/2024 Updated on 05/31/2025 

require_once '../Utility/word_bank.php';
require $databaseFile;
include $SQLGeneratorFile;
require_once '../../configuration/config_logging.php'; // Ensure logging is available

abstract Class SQLOp {
   protected $statement;
   Protected $tableName;
   Protected $SQLstring;
   Protected $conn;
   protected $database;

   public function __construct(){
    $this -> database = new Database();
   }
   public function connect(){
    $this -> conn = null;
    try{
        $this -> conn = $this -> database -> getConnection();
    }
    catch(PDOException $e){
        writeLog("Database connection failed: " . $e->getMessage(), 'database', 'ERROR');
        throw $e;
    }
   }
   public function DB_close(){
    $this -> database -> closeDB();
   }
}

// Class insertOp is used to add rows into existing table
Class insertOp extends SQLOp {
    private $keys = [];
    function set_table_names (...$columnNames){
        $count = 0;
        foreach($columnNames as $columnName){
            $this -> keys[$count++] = $columnName;
        }
    }

    function add_query($tableName,...$values){
        $SQLstring = "";
        $parList = [];
        $SQLstring = sql_inserting_com($tableName ,$this -> keys);

        for($i = 0; $i < count($this -> keys); $i++){
            if(!empty($values[$i])){
                $parList[":" . $this -> keys[$i]] = $values[$i];
            }
        }

        $statement = $this -> conn -> prepare($SQLstring);

        if ($statement === false) {
            writeLog("SQL statement preparation failed: " . print_r($this -> conn->errorInfo(), true), 'database', 'ERROR');
            throw new Exception("SQL statement preparation failed.");
        }

        foreach($parList as $para => $value){
            $statement -> bindValue($para, $value);
        }

        if (!$statement) {
            writeLog("Statement preparation failed: " . print_r($this -> conn->errorInfo(), true), 'database', 'ERROR');
            throw new Exception("Statement preparation failed.");
        }
        return $statement;
    }
        
    function execute_query($statement){
        try{
            if($statement -> execute()){
                $this -> database -> closeDB();
                return true;
            } else {
                writeLog("SQL execution failed in insertOp.", 'database', 'ERROR');
                return false;
            }
        }
        catch(PDOException $e){
            writeLog("Execution not successful for the add_query: " . $e -> getMessage(), 'database', 'ERROR');
            return false;
        }
    }
}

// Class queryOp is used to view a table in its entirety.
Class queryOp extends SQLOp {
    protected $tableName;
    private $stmt;
    public function set_table_name(string $tableName){
        $this -> tableName = $tableName;
    }

    public function query_table(){
        $this -> SQLstring = "SELECT * FROM ";
        $this -> stmt = $this -> conn -> query($this -> SQLstring.$this ->tableName);
    }

    public function print_table(){
        $headStmts = $this -> stmt -> fetch(PDO::FETCH_ASSOC);

        if($headStmts){
            echo "<table border = 1>";
            echo "<tr>";
            foreach(array_keys($headStmts) as $colName){
                echo "<th>" . htmlspecialchars($colName ?? '') . "</th>";
            }
            echo "</tr>";

            echo "<tr>";
            foreach($headStmts as $row_value){
                echo "<td>" . htmlspecialchars($row_value ?? '') . "</td>"; 
            }
            echo "</tr>";

            while($row = $this -> stmt -> fetch(PDO::FETCH_ASSOC)){
                echo "<tr>";
                foreach($row as $row_value){
                    echo "<td>" . htmlspecialchars($row_value ?? '') . "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        }
        else {
            echo "No data found.";
        }
        $this -> database -> closeDB();
    }
}

class updateOp extends SQLOp{
    protected $statement;

    public function set_table_update($tableName, $columnValue){
        include 'word_bank.php';
        $columnArray = [];
        $combineColumnArray =[];

        $tableColumnValue = array_values($columnValue);
        $tableColumnName = array_keys($columnValue);

        $pValue = array_shift($tableColumnValue);
        $primaryKeyColumnName = array_shift($tableColumnName); 

        $this -> SQLstring = update_string($tableName, $tableColumnName, $primaryKeyColumnName);
        $this -> statement = $this -> conn -> prepare($this -> SQLstring);

        if($this -> statement === false){
            writeLog("SQL statement preparation failed: " . print_r($this -> conn-> errorInfo(), true), 'database', 'ERROR');
            throw new Exception("SQL statement preparation failed.");
        }

        for($i = 1; $i <= count($tableColumnName); $i++){
            $columnArray [] = ":columnValue$i";
        };

        $combineColumnArray = array_combine($columnArray, $tableColumnValue);

        foreach ($combineColumnArray as $colName => $colValue){
            $this -> statement -> bindValue($colName, $colValue);
        }
        
        $this -> statement ->bindValue('pValue', $pValue);
    }

    public function update_table() {
        try{
            if($this -> statement -> execute()){
                $this -> database -> closeDB();
                return true;
            }
        }
        catch(PDOException $e){
            writeLog("Execution not successful in updateOp: " . $e -> getMessage(), 'database', 'ERROR');
            return false;
        }
    }
}

class deleteOp extends SQLOp {
    public function set_table_delete($tableName, $primaryIdName, $deleteValue1){
        $this -> SQLstring = "DELETE FROM $tableName WHERE $primaryIdName = :deleteValue1";
        $this -> statement = $this -> conn -> prepare($this -> SQLstring);
        if($this -> statement === false){
            writeLog("SQL statement preparation failed: " . print_r($this -> conn-> errorInfo(), true), 'database', 'ERROR');
            throw new Exception("SQL statement preparation failed.");
        }
        $this -> statement -> bindParam(':deleteValue1', $deleteValue1, PDO::PARAM_STR);
    }

    public function delete_row(){
        try{
            $this -> statement -> execute();
            $this -> database -> closeDB();
            return true;
        }
        catch(PDOException $e){
            writeLog("Execution failed in deleteOp: " . $e->getMessage(), 'database', 'ERROR');
            return false;
        }
    }
}

class pcSetUp extends SQLOp{
    private $namedTable = "";
    public function add_row(...$values){
        try{
            $this -> statement = $this -> conn -> prepare("INSERT INTO pcsetups (pc_id, mobo_id, gpu_id, ram_id, storage_slot_id, psu_id, monitor_id, acc_id, kb_id, mouse_id, tableLocation, PCcondition)
                VALUES (:val1, :val2, :val3, :val4, :val5, :val6, :val7, :val8, :val9, :val10, :val11, :val12)");

            for($i = 1; $i <= count($values); $i++){
                $this -> statement -> bindValue(":val$i",$values[$i - 1]);
            }

            if($this -> statement === false) {
                writeLog("Statement preparation failed in pcSetUp::add_row: " . print_r($this -> conn->errorInfo(), true), 'database', 'ERROR');
                throw new Exception("Statement preparation failed.");
            }

            try{
                $this -> statement -> execute();
            }
            catch(PDOException $e){
                writeLog("Insertion not successful in pcSetUp::add_row: " . $e -> getMessage(), 'database', 'ERROR');
                throw $e;
            }
        }
        catch(PDOException $e){
            writeLog("Execution not successful for add_row in pcSetUp: " . $e -> getMessage(), 'database', 'ERROR');
            throw $e;
        }
    }

    public function set_table_name($tableName){
        $this -> namedTable = $tableName;
    }
    public function view_table(){
        try{
            $viewStatement = $this -> conn -> query("SELECT * FROM " .  $this -> namedTable);
            $data = $viewStatement -> fetchAll(PDO::FETCH_ASSOC);
            if($data){
                return $data;
            }
            else{
                return ['message' => 'No Data fetched'];
            }
        }
        catch (PDOException $e) {
            writeLog("Execution not successful for view_table in pcSetUp: " . $e -> getMessage(), 'database', 'ERROR');
            return ['message' => 'Error fetching data'];
        }
    }

    public function update_row($columnNameValue, $pValue){
        $tableName = "pcsetups";
        $tableColumnName = array_keys($columnNameValue);
        $tableColumnValue = array_values($columnNameValue);
        $updateStmnt = update_string($tableName, $tableColumnName, 'pc_id');
        $updateSqlStmnt = $this -> conn -> prepare($updateStmnt);

        if($updateSqlStmnt === false){
            writeLog("SQL statement preparation failed in pcSetUp::update_row: " . print_r($this -> conn-> errorInfo(), true), 'database', 'ERROR');
            throw new Exception("SQL statement preparation failed.");
        }
        try{
            $this->conn->beginTransaction();

            for ($i = 1; $i <= count($tableColumnName); $i++) {
                $paramName = ":columnValue$i";
                $updateSqlStmnt->bindParam($paramName, $tableColumnValue[$i - 1]);
            }

            $updateSqlStmnt -> bindParam('pValue', $pValue);
            $updateSqlStmnt -> execute();
            $this -> conn -> commit();
        }
        catch(PDOException $e){
            writeLog("Execution not successful in pcSetUp::update_row: " . $e -> getMessage(), 'database', 'ERROR');
            $this -> conn -> rollBack();
            throw $e;
        }
    }

    public function delete_row($deleteValue){
        $this -> statement = $this -> conn ->prepare("DELETE FROM pcsetups WHERE pc_id = :id_value");

        if($this -> statement === false){
            writeLog("SQL statement preparation failed in pcSetUp::delete_row: " . print_r($this -> conn-> errorInfo(), true), 'database', 'ERROR');
            throw new Exception("SQL statement preparation failed.");
        }

        $this -> statement -> bindParam(':id_value', $deleteValue);

        try{
            $this -> statement -> execute();   
        }
        catch(PDOException $e){
            writeLog("Deletion not successful in pcSetUp::delete_row: " . $e -> getMessage(), 'database', 'ERROR');
            throw $e;
        }
    }
}
?>
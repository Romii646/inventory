<?php

    // Created by Aaron C. 09/25/2024 Finished: 12/01/2024
    // Local variables
    $errorCount = 0;
    // Validate input function
    /**
     * Validates input data.
     * 
     * @param mixed $data Data to validate.
     * @param string $entryName Name of the entry being validated.
     * @return string Validated data.
     */
    function validate_input($data, $entryName): String{
        global $errorCount;
        $isValid = false;
        $pattern = "[^;,.?\"'<>!#$%^&*()_+=-]";
        if(empty($data)){
            display_error($entryName, $isValid);
            $data = "";
            return $data;
        }
        else if(preg_match($pattern, $data)){
            $isValid = true;
            display_error($entryName, $isValid);
            $data = "";
            return $data;
        }
        return $data;
    }

    // Display error function
    /**
     * Displays an error message and increments the error count.
     * 
     * @param string $entryName Name of the entry that caused the error.
     */
    function display_error($entryName, $isvalid){
        global $errorCount;
        if($isvalid == true){
            echo "illegal characters found in \"$entryName\"<br>";
            $errorCount++; 
        }
        else{
            echo "The field \"$entryName\" is required. Error count: \"$errorCount\"<br>";
            $errorCount++;
        }
    }
    
    // End of function list
?>
<?php
    // Turn on output buffering
    ob_start();
    
    // Timezone
    date_default_timezone_set("Europe/Dublin");
    
    // DB Connection
    try{
        $con = new PDO();
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>
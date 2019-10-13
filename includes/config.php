<?php
    // Turn on output buffering
    ob_start();
    session_start();
    
    // Timezone
    date_default_timezone_set("Europe/Dublin");
    
    // DB Connection
    try{
        $con = new PDO("mysql:host=127.0.0.1:4848;dbname=vidztube", "root", "");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>

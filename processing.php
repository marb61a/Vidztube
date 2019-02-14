<?php
    require_once("includes/header.php");
    require_once("includes/classes/VideoUploadData.php");
    require_once("includes/classes/VideoProcessor.php");
    
    if(!isset($_POST["uploadButton"])) {
        echo "No file sent to the page";
        exit();
    }
    
    // Step 1 -- Create file upload data
    $videoUploadData = new VideoUploadData(
        $_FILES["fileInput"], 
        $_POST["titleInput"],
        $_POST["descriptionInput"],
        $_POST["privacyInput"],
        $_POST["categoryInput"],
        "REPLACE-THIS"        
    );
    
    // Step 2 -- Process the video upload data
    $videoProcessor = new VideoProcessor($con);
    $wasSuccessful = $videoProcessor->upload($videoUpoadData);
    
    // Step 3 -- Check if upload was successful
    if($wasSuccessful) {
        echo "Upload successful";
    }
?>
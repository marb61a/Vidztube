<?php
    require_once("includes/header.php");
    require_once("includes/classes/VideoPlayer.php");
    require_once("includes/classes/VideoDetailsFormProvider.php");
    require_once("includes/classes/VideoUploadData.php");
    require_once("includes/classes/SelectThumbnail.php");
    
    if(!User::isLoggedIn()) {
         header("Location: signIn.php");
    }
    
    
?>

<script src="assets/js/editVideoActions.js"></script>
<div class="editVideoContainer column">
    <div class="message">
        <?php echo $detailsMessage; ?>
    </div>
    <div class="topSection">
        <?php
        
        ?>
    </div>
</div>
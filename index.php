<?php require_once("includes/header.php"); ?>

<?php
    if(isset($_SESSION["isLoggedIn"])) {
        echo "user is logged in as " . $userLoggedInObj->getName();;
    } else {
        echo "User not logged in";
    }
?>

<?php require_once("includes/footer.php"); ?>
                    

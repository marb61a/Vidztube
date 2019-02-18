<?php
    require_once("includes/config.php"); 
    require_once("includes/classes/Account.php");
    require_once("includes/classes/Constants.php"); 
    require_once("includes/classes/FormSanitizer.php"); 
    
    $account = new Account($con);
    
    if(isset($_POST["submitButton"])){
        $firstName = FormSanitizer::sanitizeFormString($_POST["firstName"]);
        $lastName = FormSanitizer::sanitizeFormString($_POST["lastName"]);
        
        $username = FormSanitizer::sanitizeFormUsername($_POST["username"]);
        
        $email = FormSanitizer::sanitizeFormEmail($_POST["email"]);
        $email2 = FormSanitizer::sanitizeFormEmail($_POST["email2"]);
    
        $password = FormSanitizer::sanitizeFormPassword($_POST["password"]);
        $password2 = FormSanitizer::sanitizeFormPassword($_POST["password2"]);
        
        $wasSuccessful = $account->register($firstName, $lastName, $username, $email, $email2, $password, $password2);
        
        if($wasSuccessful) {
            $_SESSION["userLoggedIn"] = $username;
            header("Location: index.php");
        }
    }
    
    function getInputName($name) {
        if(isset($_POST[$name])) {
            echo $_POST[$name];
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>VidzTube</title>

        <!--CSS Imports-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
        
        <!--JS Imports-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" 
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" 
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
    </head>
    <body>
        <div class="signInContainer">
            <div class="column">
                <div class="header">
                    <img src="assets/images/icons/VideoTubeLogo.png" title="logo" alt="Site logo">
                    <h3>Sign Up</h3>
                    <span>to continue to VidzTube</span>    
                </div>
            </div>
        </div>
    </body>
</html>
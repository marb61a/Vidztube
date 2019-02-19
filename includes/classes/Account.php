<?php
    class Account {
        private $con;
        private $errorArray = array();
        
        public function __construct($con) {
            $this->con = $con;
        }
        
        public function login() {
            
        }
        
        public function register($fn, $ln, $un, $em, $em2, $pw, $pw2) {
            $this->validateFirstName($fn);
            $this->validateLastName($ln);
            $this->validateUsername($un);
            $this->validateEmails($em, $em2);
            $this->validatePasswords($pw, $pw2);
            
            if(empty($this->errorArray)){
                return $this->insertUserDetails($fn, $ln, $un, $em, $pw);
            } else {
                return false;
            }
        }
        
        public function insertUserDetails($fn, $ln, $un, $em, $pw) {
            $pw = hash('sha32', $pw);
            $profilePic = "assets/images/profilePictures/default.png";
            
            $query = $this->con->prepare("INSERT INTO users (firstName, lastName, username, email, password, profilePic)
                                        VALUES(:fn, :ln, :un, :em, :pw, :pic)");
            $query->bindParam(":fn", $fn);
            $query->bindParam(":ln", $ln);
            $query->bindParam(":un", $un);
            $query->bindParam(":em", $em);
            $query->bindParam(":pw", $pw);
            $query->bindParam(":pic", $profilePic);
            
            return $query->execute();
        }
        
        private function validateFirstName($fn) {
            if(strlen($fn) > 25 || strlen($fn) < 2) {
                array_push($this->errorArray, Constants::$firstNameCharacters);
            }
        }
        
        private function validateLastName($ln) {
            if(strlen($ln) > 25 || strlen($ln) < 2) {
                array_push($this->errorArray, Constants::$lastNameCharacters);
            }
        }
        
        private function validateUsername($un) {
            if(strlen($un) > 25 || strlen($un) < 5) {
                array_push($this->errorArray, Constants::$usernameCharacters);
                return;
            }
            
            $query = $this->con->prepare("SELECT username FROM users WHERE username=:un");
            $query->bindParam(":un", $un);
            $query->execute();
            
            if($query->rowCount() != 0) {
                array_push($this->errorArray, Constants::$usernameTaken);
            }
        }
        
        public function getError($error) {
            if(in_array($error, $this->errorArray)) {
                return "<span class='errorMessage'>$error</span>";
            }
        }
    }
?>
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
        
        public function getError($error) {
            if(in_array($error, $this->errorArray)) {
                return "<span class='errorMessage'>$error</span>";
            }
        }
    }
?>
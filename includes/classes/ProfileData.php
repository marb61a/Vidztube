<?php
    class ProfileData {
        private $con, $profileUserObj;
        
        public function __construct($con, $profileUsername) {
            $this->con = $con;
            $this->profileUserObj = new User($con, $profileUsername);
        }
        
        public function getProfileUserObj() {
            return $this->profileUserObj;
        }
        
        public function getProfileUsername() {
            return $this->profileUserObj->getUsername();
        }
        
        public function userExists() {
            $query = $this->con->prepare("SELECT * FROM users WHERE username = :username");
            $query->bindParam(":username", $profileUsername);
            $profileUsername = $this->getProfileUsername();
            $query->execute();
            
            return $query->rowCount() != 0;
        }
        
    }
?>
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
            
        }
    }
?>
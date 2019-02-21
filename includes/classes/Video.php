<?php
    class Video {
        private $con, $sqlData, $userLoggedInObj;
        
        public function __construct($con, $input, $userLoggedInObj) {
            $this->con = $con;
            $this->userLoggedInObj = $userLoggedInObj;
            
        }
        
        public function getId() {
            return $this->sqlData["id"];
        }
        
    }
?>
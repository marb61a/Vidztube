<?php
    class SearchResultsProvider {
        private $con, $userLoggedInObj;

        public function __construct($con, $userLoggedInObj) {
            $this->con = $con;
            $this->userLoggedInObj = $userLoggedInObj;
        }
        
        public function getVideos($term, $orderBy) {
            
        }
    }
?>
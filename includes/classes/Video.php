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
        
        public function getUploadedBy() {
            return $this->sqlData["uploadedBy"];
        }
    
        public function getTitle() {
            return $this->sqlData["title"];
        }
    
        public function getDescription() {
            return $this->sqlData["description"];
        }
    
        public function getPrivacy() {
            return $this->sqlData["privacy"];
        }
    
        public function getFilePath() {
            return $this->sqlData["filePath"];
        }
    
        public function getCategory() {
            return $this->sqlData["category"];
        }
    
        public function getUploadDate() {
            return $this->sqlData["uploadDate"];
        }
    
        public function getViews() {
            return $this->sqlData["views"];
        }
    
        public function getDuration() {
            return $this->sqlData["duration"];
        }
        
        public function like() {
            $id = $this->getId();
            $username = $this->userLoggedInObj->getUsername();
            
            if($this->wasLikedBy()) {
                // User has already liked
                $query = $this->con->prepare("DELETE FROM likes WHERE username=:username AND videoId=:videoId");
                $query->bindParam(":username", $username);
                $query->bindParam(":videoId", $id);
                $query->execute();
                
                $result = array(
                    $likes => -1,
                    "dislikes" => 0
                );
                return json_encode($result);
            } else {
                
            }
        }
        
        public function dislike() {
            $id = $this->getId();
            $username = $this->userLoggedInObj->getUsername();
            
            if($this->wasDislikedBy()) {
                // User has already disliked
                
            }
        }
        
        public function wasLikedBy() {
            
        }
        
        public function wasDislikedBy() {
            
        }
    }
?>
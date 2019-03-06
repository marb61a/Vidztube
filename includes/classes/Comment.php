<?php
    require_once("ButtonProvider.php");
    require_once("CommentControls.php");
    
    class Comment {
        private $con, $sqlData, $userLoggedInObj, $videoId;
        
        public function __construct($con, $input, $userLoggedInObj, $videoId) {
            if(!is_array($input)) {
                $query = $con->prepare("SELECT * FROM comments where id=:id");
                $query->bindParam(":id", $input);
                $query->execute();
                
                $input = $query->fetch(PDO::FETCH_ASSOC);
            }
            
            $this->sqlData = $input;
            $this->con = $con;
            $this->userLoggedInObj = $userLoggedInObj;
            $this->videoId = $videoId;
        }
        
        public function create() {
            $id = $this->sqlData["id"];
            $videoId = $this->getVideoId();
            $body = $this->sqlData["body"];
            $postedBy = $this->sqlData["postedBy"];
            $profileButton = ButtonProvider::createUserProfileButton($this->con, $postedBy);
            $timespan = $this->time_elapsed_string($this->sqlData["datePosted"]);
    
            $commentControlsObj = new CommentControls($this->con, $this, $this->userLoggedInObj);
            $commentControls = $commentControlsObj->create();
            
            return "<div class='itemContainer'>
                <div class='comment'>
                    $profileButton
                    
                </div>
            </div>";
        }
        
        public function time_elapsed_string($datetime, $full = false) {
            $now = new DateTime;
            $ago = new DateTime($datetime);
            $diff = $now->diff($ago);
        
        } 
        
        public function getId() {
            return $this->sqlData["id"];
        }
        
        public function getVideoId() {
            return $this->videoId;
        }
    }
?>
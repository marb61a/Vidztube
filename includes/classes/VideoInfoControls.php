<?php
    require_once("includes/classes/ButtonProvider.php");
    
    class VideoInfoControls {
        private $video, $userLoggedInObj;
        
        public function __construct($video, $userLoggedInObj) {
            $this->video = $video;
            $this->userLoggedInObj = $userLoggedInObj;
        }
        
        public function create() {
            $likeButton = $this->createLikeButton();
            $dislikeButton = $this->createDislikeButton();
            
            return "<div class='controls'>
                $likeButton
                $dislikeButton
            </div>";
        }
    } 
?>
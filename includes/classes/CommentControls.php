<?php
    require_once("ButtonProvider.php"); 
    
    class CommentControls {
        private $con, $comment, $userLoggedInObj;
        
        public function __construct($con, $comment, $userLoggedInObj) {
            $this->con = $con;
            $this->comment = $comment;
            $this->userLoggedInObj = $userLoggedInObj;
        }
        
        public function create() {
            $replyButton = $this->createReplyButton();
            $replySection = $this->createReplySection();
            
            return "<div class='controls'>
                $replyButton
            </div>";
            $replySection;
        }
        
        private function createReplyButton() {
            $text = "REPLY";
            $action = "toggleReply(this)";
            
            return ButtonProvider::createButton($text, null, $action, null);
        }
        
        private function createLikesCount() {
            $text = $this->comment->getLikes();
    
            if($text == 0) $text = "";
    
            return "<span class='likesCount'>$text</span>";
        }
    
        private function createReplySection() {
            $postedBy = $this->userLoggedInObj->getUsername();
            $videoId = $this->comment->getVideoId();
            $commentId = $this->comment->getId();
    
            $profileButton = ButtonProvider::createUserProfileButton($this->con, $postedBy);
            
            $cancelButtonAction = "toggleReply(this)";
            $cancelButton = ButtonProvider::createButton("Cancel", null, $cancelButtonAction, "cancelComment");
    
            $postButtonAction = "postComment(this, \"$postedBy\", $videoId, $commentId, \"repliesSection\")";
            $postButton = ButtonProvider::createButton("Reply", null, $postButtonAction, "postComment");
    
            return "<div class='commentForm hidden'>
                $profileButton
                <textarea class='commentBodyClass' placeholder='Add a public comment'></textarea>
                $cancelButton
                $postButton
            </div>";
        }
    }
?>
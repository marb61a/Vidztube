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
        
        private function createReplySection() {
            
        }
    }
?>
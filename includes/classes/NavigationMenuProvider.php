<?php
    class NavigationMenuProvider {
        private $con, $userLoggedInObj;
        
        public function __constuct($con, $userLoggedInObj) {
            $this->con = $con;
            $this->userLoggedInObj = $userLoggedInObj;
        }
        
        private function create() {
            $menuHtml = $this->createNavItem("Home", "assets/images/icons/home.png", "index.php");
            
        }
        
        private function createNavItem($text, $icon, $link) {
            return "<div class='navigationItem'>
                <a href='$link'>
                    <img src='$icon'>
                    <span>$text</span>
                </a>
            </div>";
        }
        
    }
?>
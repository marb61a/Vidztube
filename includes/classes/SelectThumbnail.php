<?php
    class SelectThumbnail {
        private $con, $userLoggedInObj;
        
        public function __construct($con, $userLoggedInObj) {
            $this->con = $con;
            $this->userLoggedInObj = $userLoggedInObj;
        }
        
        public function create() {
            $thumbnailData = $this->getThumbnailData();
            $html = "";
            
            foreach($thumbnailData as $data) {
                $html .= $this->createThumbnailItem($data);
            }
            
            return "<div class='thumbnailsItemContainer'>
                $html
            </div>";
        }
        
        private function createThumbnailItem($data) {
            $id = $data["id"];
            $url = $data["filePath"];
            $videoId = $data["videoId"];
            
            return "";
        }
    }
?>
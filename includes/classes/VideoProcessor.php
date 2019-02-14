<?php
    class VideoProcessor {
        private $con;
        private $sizeLimit = 500000000;
        private $allowedTypes = array("mp4", "flv", "webm", "mkv", "vob", "ogv", "ogg", "avi", "wmv", "mov", "mpeg", "mpg");
        
        public function __construct($con) {
            $this->con = $con;
        }
        
        public function upload($videoUploadData) {
            $targetDir = "uploads/videos";
            $videoData = $videoUploadData->videoDataArray;

            $tempFilePath = $targetDir . uniqid() . basename($videoData["name"]);
            $tempFilePath = str_replace(" ", "_", $tempFilePath);
    
            $isValidData = $this->processData($videoData, $tempFilePath);
    
            if(!$isValidData) {
                return false;
            }
            
        }
    }
?>
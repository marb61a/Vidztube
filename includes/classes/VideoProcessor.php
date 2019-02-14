<?php
    class VideoProcessor {
        private $con;
        private $sizeLimit = 500000000;
        private $allowedTypes = array("mp4", "flv", "webm", "mkv", "vob", "ogv", "ogg", "avi", "wmv", "mov", "mpeg", "mpg");
        
        // UNCOMMENT OF THE FOLLOWING DEPENDING ON YOUR OS
        // private $ffmpegPath = "ffmpeg/mac/regular-xampp/ffmpeg"; // *** MAC (USING REGULAR XAMPP) ***
        // private $ffmpegPath = "ffmpeg/mac/xampp-VM/ffmpeg"; // *** MAC (USING XAMPP VM) ***
        private $ffmpegPath = "ffmpeg/linux/ffmpeg"; // *** LINUX ***
        // private $ffmpegPath = "ffmpeg/windows/ffmpeg.exe"; //  *** WINDOWS ***
        
        // ASLO UNCOMMENT ONE OF THESE DEPENDING ON YOUR OS
        // private $ffprobePath = "ffmpeg/mac/regular-xampp/ffprobe"; // *** MAC (USING REGULAR XAMPP) ***
        // private $ffprobePath = "ffmpeg/mac/xampp-VM/ffprobe"; // *** MAC (USING XAMPP VM) ***
        private $ffprobePath = "ffmpeg/linux/ffprobe"; // *** LINUX ***
        // private $ffprobePath = "ffmpeg/windows/ffprobe.exe"; //  *** WINDOWS ***
        
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
            
            if(move_uploaded_file($videoData["tmp_name"], $tempFilePath)) {
                $finalFilePath = $targetDir . uniqid() . ".mp4";
                
                if(!$this->insertVideoData($videoUploadData, $finalFilePath)) {
                    echo "Insert query failed\n";
                    return false;
                }
                
                if(!$this->convertVideoToMp4($tempFilePath, $finalFilePath)) {
                    echo "Upload failed\n";
                    return false;
                }
                
                return true;
            }
        }
        
        private function processData($videoData, $filePath) {
            $videoType = pathInfo($filePath, PATHINFO_EXTENSION);
            
        }
        
        private function isValidSize($data) {
            return $data["size"] <= $this->sizeLimit;
        }
        
        private function insertVideoData($uploadData, $filePath) {
            
        }
    }
?>
<?php
    class VideoGridItem {
        private $video, $largeMode;
        
        public function __construct($video, $largeMode) {
            $this->video = $video;
            $this->largeMode = $largeMode;
            $url = "watch.php?id=" . $this->video->getId();
            
            return "<a href='$url'>
            
            </a>";
        }
        
        public function create() {
            $thumbnail = $this->createThubnail();
            $details = $this->createDetails();
            
        }
        
        private function createThubnail() {
            $thumbnail = $this->video->getThumbnail();
            $duration = $this->video->getDuration();
            
        }
        
        private function createDetails() {
            $title = $this->video->getTitle();
            $username = $this->video->getUploadedBy();
            $views = $this->video->getViews();
            $description = $this->createDescription();
            $timestamp = $this->video->getTimeStamp();
            
            return "<div class='details'>
                <h3 class='title'>$title</h3>
                <span class='username'>$username</span>
                <div class='stats'>
                    <span class='viewCount'>$views views - </span>
                    <span class='timeStamp'>$timestamp</span>
                </div>
                $description
            </div>";
        }
    }
?>
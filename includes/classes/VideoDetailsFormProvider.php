<?php
    class VideoDetailsFormProvider {
        private $con;
        
        public function __construct($con) {
            $this->con = $con;
        }
        
        public function createUploadForm() {
            $fileInput = $this->createFileInput();
            $titleInput = $this->createTitleInput();
            
        }
        
        private function createFileInput() {
            return "<div class='form-group'>
                <label for='exampleFormControlFile1'>Your file</label>
                <input type='file' class='form-control-file' id='exampleFormControlFile1' name='fileInput' required>
            </div>";
        }
        
        private function createTitleInput() {
            return "<div class='form-group'>
                <input class='form-control' type='text' placeholder='Title' name='titleInput'>
            </div>";
        }
    }    
?>
<?php
    class SettingsFormProvider {
        public function createUserDetailsForm($firstName, $lastName, $email) {
            $firstNameInput = $this->createFirstNameInput($firstName);
            $lastNameInput = $this->createLastNameInput($lastName);
            $emailInput = $this->createEmailInput($email);
            $saveButton = $this->createSaveUserDetailsButton();
            
        }   
        
        public function createPasswordForm() {
            
        }
        
        private function createFirstNameInput($value) {
            
        }
        
        private function createLastNameInput($value) {
             
        }
         
        private function createEmailInput($value) {
            if($value == null) $value = "";
            
        }
        
        private function createSaveUserDetailsButton() {
            return "<button type='submit' class='btn btn-primary' name='saveDetailsButton'>
                Save
            </button>";
        }

        private function createSavePasswordButton() {
            return "<button type='submit' class='btn btn-primary' name='savePasswordButton'>
                Save
            </button>";
        }
    }
?>
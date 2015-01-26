<?php

/**
 * @description class DisplayManager is used to provide the interface for displaying messages
 *
 * @author Abhijeet
 */
class DisplayManager {
    
    /**
     * @description showErrorMessage function is used to display error message
     * @param type $message
     */
    public function showErrorMessage($message) {
        
        echo '[ERROR]: '. $message .PHP_EOL; die;
    }
    
    /**
     * @description showErrorMessage function is used to display success message
     * @param type $message
     */
    public function showSuccessMessage($message) {
        
        echo '[SUCCESS]: '. $message .PHP_EOL; die;
    }
    
    /**
     * @description showErrorMessage function is used to display any message other than error and success
     * @param type $message
     */
    public function showMessage($message) {
        
        echo $message . PHP_EOL; die;
    }
}

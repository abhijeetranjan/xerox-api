<?php

/**
 * @description class BaseTicketManager is used to provide all the required functionality to run this script such as required parameters
 *
 * @author Abhijeet
 */
class BaseTicketManager {
    
    public $requiredParameters;
    
    public function __construct() {
        
        $this->requiredParameters = array('-u', '-p', '-d');
    }
}

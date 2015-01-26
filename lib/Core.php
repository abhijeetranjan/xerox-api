<?php

require_once 'BaseTicketManager.php';
require_once 'CustomErrorHandler.php';

/**
 * Description of Core
 *
 * @author Abhijeet
 */
class Core {
    
    protected $customErrorHandler;
    protected $baseTicketManager;
    
    /**
     * @description In __construct, we initialise the CustomErrorHandler and BaseTicketManager class that can be accessible to ulitiyclass 
     *              to throw any error and to validate passed parameters
     * 
     */
    public function __construct() {
        
        $this->baseTicketManager = new BaseTicketManager();
        $this->customErrorHandler = new CustomErrorHandler();
    }
}

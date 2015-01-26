<?php

/**
 * Description class ErrorHandler is used to manage error handling
 *
 * @author Abhijeet
 */
class CustomErrorHandler {
    
    /**
     * @description function is used to throw custom error
     * @param string $errorMsg
     */
    public function throwError($errorMsg, $args = '') {
        
        echo PHP_EOL.'[ERROR]: '.$errorMsg.PHP_EOL;
        if(DEBUG){                 
            echo PHP_EOL.'Now printing stack trace. You can turn it off by defining DEBUG false in config.php'.PHP_EOL;
            echo PHP_EOL.'------------------------------------------------------------'.PHP_EOL.PHP_EOL;
            debug_print_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);            
        }
        $this->showHelp($args);
    }
    
    /**
     * @description function is used to print syntax help
     */
    public function showHelp(array $args) 
    {
        if (strtoupper(PHP_OS) === 'LINUX') {
            echo PHP_EOL."\033[0;31m".SYNTAX_HELPER. " \033[0m".PHP_EOL;
        } else {
            echo PHP_EOL.SYNTAX_HELPER.PHP_EOL;
        }        
        die;
    }
}

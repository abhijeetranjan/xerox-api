<?php

/**
 * Description class RepoFactory is used to create object of the class on runtime depending on the requested repository
 *
 * @author Abhijeet
 */

class RepoFactory {
    
    /**
     * @description function is declared as static so no other instance can be generated and returns the object of desired api on runtime
     * @param string $repoIdentifier
     * @return object \GENERIC|\repoIdentifier|\BITBUCKET|\GITHUB
     */
    public static function createRepoUrl($repoIdentifier) {
        
        if(!filter_var($repoIdentifier, FILTER_VALIDATE_URL)) {
            
            $repoIdentifier = strtoupper($repoIdentifier);
            self::__autoload($repoIdentifier);
            return new $repoIdentifier();
        } else {
            
            if(strpos($repoIdentifier, 'github')) {
                
                self::__autoload('GITHUB');
                return new GITHUB($repoIdentifier);
            } else if(strpos($repoIdentifier, 'bitbucket')) {
                
                self::__autoload('BITBUCKET');
                return new BITBUCKET($repoIdentifier);
            } else {
                
                self::__autoload('GENERIC');
                return new GENERIC($repoIdentifier);
            }
        }
    }
    
    /**
     * @description magic method __autoload is used to include desired class on runtime
     * @param string $class_name
     */
    public static function __autoload($class_name) {
        
        $filename = getcwd().DIRECTORY_SEPARATOR.'component'.DIRECTORY_SEPARATOR. $class_name .'.php';
        
        if(!file_exists($filename))
        {
            $displayManager = new DisplayManager();
            $message = 'Invalid Repository Url';
            $displayManager->showErrorMessage($message);
        } else {
            include $filename;
        }
        
    }
}

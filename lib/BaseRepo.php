<?php
/**
 * @description class BaseRepo provide the functionality of sending request to api's
 *
 * @author Abhijeet
 */
class BaseRepo {
    
    public $displayManager;
    
    public function __construct() {
        $this->displayManager = new DisplayManager();
    }
    /**
     * @description function is used to send request to repository
     * @param type $method
     * @param type $username
     * @param type $password
     * @param type $postData
     * @param type $jsonFlag
     */
    public function sendRequest($username, $password, $repositoryURL='', $postData, $jsonFlag = true) {
                
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$repositoryURL);        
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        
        if($jsonFlag)
        {
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        }        
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_USERPWD, $username.':'.$password);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1');

        $server_output = curl_exec($ch);
        
        if(strtolower($server_output) == 'none')
        {
            $message = 'Invalid Repository URL';
            $this->displayManager->showErrorMessage($message);
        } else {

            $info = curl_getinfo($ch); $errorMessage = 'Connection Error'; $successMessage = '';
                                
            switch ($info['http_code']) {
                case 400:
                    $errorMessage = 'Bad Request, Passed parameters cannot be parsed';
                    break;
                case 401:
                    $errorMessage = 'Unauthorized access, Username or password is incorrect';
                    break;
                case 404:
                    $errorMessage =  'Invalid Repository URL';
                    break;
                case 200:
                    $successMessage = 'Your issue is successfully created';
                    break;
                case 201:
                    $successMessage = 'Your issue is successfully created';
                    break;
                case 202:
                    $successMessage = 'Your issue is successfully created';
                    break;
                case 203:
                    $errorMessage =  'Non-Authoritative Information';
                    break;
                case 408:
                    $errorMessage =  'Unable to connect host, make sure you are connecting to right file';
                    break;
                case 408:
                    $errorMessage =  'Unable to connect host, make sure you are connecting to right file';
                    break;
                case 503:
                    $errorMessage =  'Unable to connect host, service is currently unavailable';
                    break;
                case 504:
                    $errorMessage =  'Unable to connect host, gateway has been timedout';
                    break;
                case 500:
                    $errorMessage =  'Internal Server Error';
                    break;
                case 500:
                    $errorMessage =  'Bad Gateway';
                    break;
                default:
                    $errorMessage =  'Invalid Repository URL';
                    break;
            }
            
            if(!empty($successMessage)) 
            {
                $this->displayManager->showSuccessMessage($successMessage);
            } else {
                $this->displayManager->showErrorMessage($errorMessage);
            }
            
        }
        curl_close($ch);
    }
}

<?php
require_once getcwd().DIRECTORY_SEPARATOR.'lib'.DIRECTORY_SEPARATOR.'BaseRepo.php';
require_once 'ComponentInterface.php';

/**
 * @description class BITBUCKET is used to create response and request of new issues on bitbucket
 * @author abhijeet
 */
class BITBUCKET extends BaseRepo implements componentInterface {
    
    protected $repositoryURL = BITBUCKET_REPO_URL; // default url to access api
    protected $param = array('title', 'content');
        
    /**
     * @description magic method __construct is created to assign repository url when the object of class created
     * @param string $repoUrl
     */
    public function __construct($repoUrl='') {
        if(!empty($repoUrl))
        {
            $this->repositoryURL = $repoUrl;
        }
    }
    
    /**
     * 
     * @description function response is used to create request and response for new issues
     * @param type $method
     * @param string $username
     * @param string $password
     * @param array $arrData
     */
    public function response( $username, $password, $arrData) {
        
        $postData = '';
        $baseRepo = new BaseRepo();
        
        $arrData = $this->bindArgsWithParam($arrData, $this->param);
        foreach($arrData as $key=>$value)
        {
            $postData .= $key.'='.$value.'&';
        }
        $postData = rtrim($postData, '&');
        if(empty($this->repositoryURL))
        {            
            $message = 'Repository Url is invalid';
            $baseRepo->displayManager->showErrorMessage($message);
        }
      
        $baseRepo->sendRequest($username, $password, $this->repositoryURL, $postData, FALSE);        
    }
    
    /**
     * @description function is used to find is passed arguments is associative or not
     * @param array $array
     * @return boolean
     */
    public function isAssoc($array)
    {
        return ($array !== array_values($array));
    }  
    
    /**
     * @description function is used to bind arguement with param
     * @param array $arrData
     * @return array $arrBinded
     */
    public function bindArgsWithParam(array $arrData, array $param) 
    {
        $k = 0; $arrBinded = array();
        foreach($arrData as $key=>$value)
        {
            if(!is_string($key))
            {
                if(isset($param[$k]))
                {                    
                    $arrBinded[$param[$k]] = $value;                    
                } else {
                    $arrBinded[$key] = $value;
                }
            } else {
                $arrBinded[$key] = $value;
            }
            $k++;
        }
        
        return $arrBinded;
    }
}

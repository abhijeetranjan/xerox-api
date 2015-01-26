<?php

/**
 * @description Component Interface provides the basic abstract functionality to the components such as BITBUCKET
 */
interface ComponentInterface
{
    public function response($username, $password, $arrData);   
    public function bindArgsWithParam(array $arrData, array $param);
}


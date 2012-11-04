<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cUtil
 *
 * @author sundar
 */
include_once 'cSecurity.php';

class cUtil {

    private $securityObj;

    function __construct() {
        $this->securityObj = new cSecurity();
    }

    function createLinkUrl($params) {
        //return $this->securityObj->encrypt($url);
        $url = "index.php?";
        foreach ($params as $key => $value) {
            $url.=$key . "=" . base64_encode($value);
        }
        return $url;
    }

    function urlDecode($params) {
        foreach ($params as $key => $value) {

            $params[$key] = base64_decode($value);
        }
        return $params;
    }

}

?>

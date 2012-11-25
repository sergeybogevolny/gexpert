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
            $url.=$key . "=" . base64_encode($value) . "&";
        }
        $url = rtrim($url, "&");
        return $url;
    }

    function urlDecode($params) {
        if (base64_decode($params['type']) == 'ajax') {

            $params["a"] = base64_decode($params["a"]);
            $params["f"] = base64_decode($params["f"]);
            $params["type"] = base64_decode($params["type"]);
        } else {
            foreach ($params as $key => $value) {

                $params[$key] = base64_decode($value);
            }
        }

        return $params;
    }

    function log_message($level = 'error', $message, $php_error = FALSE) {
        static $_log;
        include_once 'cLogging.php';
        $_log = new cLogging();

        $_log->write_log($level, $message, $php_error);
    }

    function formatDate($date, $dateformat = AppDateFormatPhp) {
        return strftime($dateformat, strtotime($date));
    }

}

?>

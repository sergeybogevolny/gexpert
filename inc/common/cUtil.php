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

    function generateProductKey() {
        $pool = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $countPool = strlen($pool);
        $totalChars = 16;
        $serial = '';
        for ($i = 0; $i < $totalChars; $i++) {
            $currIndex = mt_rand(0, $countPool);
            $currChar = $pool[$currIndex];
            $serial .= $currChar;
        }
        return $serial;
    }

    function redirect($uri = '', $method = 'default', $http_response_code = 302) {
//		if ( ! preg_match('#^https?://#i', $uri))
//		{
//			$uri = site_url($uri);
//		}

        switch ($method) {
            case 'refresh' : header("Refresh:0;url=" . $uri);
                break;
            case 'default' :
                $encoded=$this->createLinkUrl($uri);
                header("Location: $encoded", TRUE, $http_response_code);
                break;
            default : header("Location: " . $uri, TRUE, $http_response_code);
                break;
        }
        exit;
    }

}

?>

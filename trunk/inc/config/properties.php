<?php



ini_set('error_reporting',E_ALL & ~E_NOTICE);
ini_set('html_errors',On);
//ini_set('expose_php',Off);
//ini_set('output_buffering',40960);
//ini_set('max_execution_time',40);
ini_set('default_charset','utf-8');
//ini_set('session.save_path','../../tech/sessions');


/**
 * Commercial
 */
define('CompanyName', 'GS');
define('CompanyURL', 'http://www.geotekh.com');

/**
 * Database
 */
define('DataBaseName', 'gbase');
define('DataBasePort', '3306');
define('DataBaseHost', 'localhost');
define('DataBaseUser', 'root');
define('DataBasePass', '');
define('DataBaseType', 'mysql');


/**
 *Security
 */

define('EncryptMethod', 'MCRYPT_RIJNDAEL_256');
define('EncryptMode', 'MCRYPT_MODE_CBC');

define('EncryptKey', '25c6c7ff35b9979b151f2136cd13b0ff');



define('AppHost',$_SERVER['HTTP_HOST']);
define('AppProtocol',((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://");
define('AppURL',AppProtocol.AppHost.'/gexpert');
define('PublicDir', 'src/');
define('IncDir', 'inc/');
define('AppController','/'.IncDir.'controller/');
define('AppController','/'.IncDir.'controller/');
define('AppCommon','/'.IncDir.'common/');
define('AppLanguage','/'.IncDir.'language/');
define('AppModel','/'.IncDir.'modal/');
define('AppJsURL',AppURL.PublicDir.'js/');
define('AppCssURL',AppURL.PublicDir.'css/');
define('AppImgURL',AppURL.PublicDir.'img/');
define('AppChartURL',AppURL.PublicDir.'chart/');
define('AppScriptURL','/'.PublicDir.'scripts/');
define('AppUploadsURL',AppRoot.'/'.PublicDir.'uploads/');
define('AppViewUploadsURL',AppURL.'/'.PublicDir.'uploads/');
define('Controllers',AppURL.IncDir.'controller/');
define('SmartyTemplateDir','templates/');
define('AppAdminDirUrl',AppURL.IncDir.'admin/');

?>

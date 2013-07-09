<?php

ini_set('error_reporting', E_ALL & ~E_NOTICE);
ini_set('html_errors', On);
//ini_set('expose_php',Off);
//ini_set('output_buffering',40960);
//ini_set('max_execution_time',40);
ini_set('default_charset', 'utf-8');
//ini_set('session.save_path','../../tech/sessions');
date_default_timezone_set('UTC');


/**
 * Database
 */
define('DataBaseName', 'gxpertize');
define('DataBasePort', '3306');
define('DataBaseHost', '192.168.1.200');
define('DataBaseUser', 'root');
define('DataBasePass', 'sundar123');
define('DataBaseType', 'mysql');




/**
 * Security
 */
define('EncryptMethod', 'MCRYPT_RIJNDAEL_256');
define('EncryptMode', 'MCRYPT_MODE_CBC');
define('EncryptKey', '25c6c7ff35b9979b151f2136cd13b0ff');



define('AppHost', $_SERVER['HTTP_HOST']);
define('AppProtocol', ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://");
define('AppURL', AppProtocol . AppHost . '/gexpert/');
define('PublicDir', 'src/');
define('IncDir', 'inc/');
define('AppController', '/' . IncDir . 'controller/');
define('AppCommon', '/' . IncDir . 'common/');
define('AppLanguage', '/' . IncDir . 'language/');
define('AppModel', '/' . IncDir . 'model/');
define('AppJsURL', AppURL . PublicDir . 'js/');
define('AppCssURL', AppURL . PublicDir . 'css/');
define('AppImgURL', AppURL . PublicDir . 'img/');
define('AppChartURL', AppURL . PublicDir . 'chart/');
define('AppScriptURL', '/' . PublicDir . 'scripts/');
define('AppUploadsURL', AppRoot . '/' . PublicDir . 'uploads/');
define('AppViewUploadsURL', AppURL . '/' . PublicDir . 'uploads/');
define('Controllers', AppURL . IncDir . 'controller/');
define('SmartyTemplateDir', 'templates/');
define('AppAdminDirUrl', AppURL . IncDir . 'admin/');
define('AppTableToolsUrl', AppURL . PublicDir . 'swf/');



/* * *
 * Language Settings
 */

define('AppLang', 'en');
define('AppLocalizationURL', '/' . IncDir . 'locale/' . AppLang . '/');

/**
 * Log Settings
 */
define('AppLogPath', '');
define('AppLogLevel', 2);
define('AppLogDateFormat', 'Y-m-d H:i:s');

/**
 * Environment
 */
define('AppEnvironment', 'Development');


/* * *
 * File operations
 */

define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);


define('FOPEN_READ', 'rb');
define('FOPEN_READ_WRITE', 'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE', 'ab');
define('FOPEN_READ_WRITE_CREATE', 'a+b');
define('FOPEN_WRITE_CREATE_STRICT', 'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');


/**
 * Application Settings
 *
 */
define('AppRequiresLogin', true);
define('AppHomePage', 'tests');
define('AppName', '');
define('AppLogo', '');


define('AppDateFormatPhp', 'F j,Y');
define('AppDateFormatJs', 'yy-mm-dd');
define('AppDateFormatDb', '%d/%m/%Y');
define('AppDateFormatDbInput', 'Y-m-d');
define('AppDateFormatTpl', '%d/%m/%Y');
define('AppSessionLessPages', serialize(array('login', 'register', 'forget_password')));

/**
 * Company Details
 */
define('CompanyName', 'Geotekh');
define('CompanyLogo', AppImgURL . 'logo.png');
define('CompanyURL', 'http://www.geotekh.com');

/**
 * Client Settings
 */
define('ClientName', 'Client Name');
define('ClientLogo', AppImgURL . 'c_logo.png');
define('ClientAddress', '');

/**
 * Brand Settings
 */
define('BrandName', 'gXpertize');
define('BrandLogo', AppImgURL . 'b_logo.png');
?>

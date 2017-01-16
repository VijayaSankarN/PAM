<?php
mb_internal_encoding("UTF-8");
date_default_timezone_set('Asia/Baku');
header('Content-Type: text/html; charset=utf-8');

error_reporting(E_ALL);
ini_set('display_errors', TRUE);

define('ROOT', $_SERVER['DOCUMENT_ROOT'].'/php-mvc');




/*Linux: /etc/apache/apache.conf
Mac: /etc/apache/httpd.conf

SetEnv APPLICATION_ENV "development"

If not configured in Apache, default environment is set to Development

*/
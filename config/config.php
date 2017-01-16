<?php

namespace PAM;


/*Linux: /etc/apache/apache.conf
Mac: /etc/apache/httpd.conf

SetEnv APPLICATION_ENV "development"

If not configured in Apache, default environment is set to Development

*/

use \medoo;

/**
* 
*/
class Config
{
    public static $assets;
    
    protected static $application_data;
    public static $database;
    
    public function __construct()
    {
        if(self::validateEnvironmentVariable()) {

            // Pre-loading Assets
            $defaultAssets = include ROOT.'/config/assets/default.php';
            $environmentAssets = [];
            if(file_exists(ROOT.'/config/assets/'.$_SERVER['APPLICATION_ENV'].'.php')) {
                $environmentAssets = include ROOT.'/config/assets/'.$_SERVER['APPLICATION_ENV'].'.php';
            }

            self::$assets = array_merge_recursive($defaultAssets,$environmentAssets);

            // Pre-loading Application Data
            $defaultEnv = include ROOT.'/config/data/default.php';
            $environmentEnv = [];
            if(file_exists(ROOT.'/config/data/'.$_SERVER['APPLICATION_ENV'].'.php')) {
                $environmentEnv = include ROOT.'/config/data/'.$_SERVER['APPLICATION_ENV'].'.php';
            }

            self::$application_data = array_merge_recursive($defaultEnv,$environmentEnv);
            self::connectDatabase();

            return true;
        } else {
            return false;
        }
    }

    public static function validateEnvironmentVariable() 
    {

        $environments = ['development','production'];

        if(!isset($_SERVER['APPLICATION_ENV'])) {
            $_SERVER['APPLICATION_ENV'] = "development";
        }

        if(!in_array($_SERVER['APPLICATION_ENV'], $environments)) {
            $_SERVER['APPLICATION_ENV'] = "development";    
        }

        return file_exists(ROOT.'/config/data/'.$_SERVER['APPLICATION_ENV'].'.php') ? true : false;
    }

    public static function connectDatabase()
    {
        if(!isset(self::$database)) {
            require_once ROOT.'/public/lib/medoo.php';
            self::$database = new medoo(self::$application_data['database']);
        }
    }
}
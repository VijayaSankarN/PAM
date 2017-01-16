<?php

namespace LESP;

class Configuration
{
    protected $assets;
    protected $application_data;
    private $environment;
    
    public function __construct()
    {
        $this->environment = Environment::get();

        // Pre-loading Assets
        $defaultAssets = include ROOT.'/config/assets/default.php';
        $environmentAssets = [];
        if(file_exists(ROOT.'/config/assets/'.$this->environment.'.php')) {
            $environmentAssets = include ROOT.'/config/assets/'.$_SERVER['APPLICATION_ENV'].'.php';
        }

        Registry::set('assets', array_merge_recursive($defaultAssets,$environmentAssets));

        // Pre-loading Application Data
        $defaultEnv = include ROOT.'/config/data/default.php';
        $environmentEnv = [];
        if(file_exists(ROOT.'/config/data/'.$this->environment.'.php')) {
            $environmentEnv = include ROOT.'/config/data/'.$_SERVER['APPLICATION_ENV'].'.php';
        }

        Registry::set('application_data', array_merge_recursive($defaultEnv,$environmentEnv));
    } 
}
<?php

namespace PAM;


// define('ROOT', $_SERVER['DOCUMENT_ROOT']);

// TODO
define('ROOT', $_SERVER['DOCUMENT_ROOT'].'/php-mvc');

require ROOT.'/config/config.php';


/**
* 
*/
class App extends Config
{
    public function __construct()
    {
        $conf = new config();   
    }
}

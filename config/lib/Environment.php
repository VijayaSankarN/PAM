<?php

namespace LESP;

class Environment 
{

    private static $environments = ['development','production'];

    public static function get() 
    {
        // if APPLICATION_ENV constant exists (set in Apache configs)
        // then return content of APPLICATION_ENV
        // else return "development"
        if(!isset($_SERVER['APPLICATION_ENV'])) {
            $_SERVER['APPLICATION_ENV'] = "development";
        }

        if(!in_array($_SERVER['APPLICATION_ENV'], self::$environments)) {
            $_SERVER['APPLICATION_ENV'] = "development";    
        }

        return $_SERVER['APPLICATION_ENV'];
    }
}
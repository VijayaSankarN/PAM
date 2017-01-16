<?php

namespace LESP;

use \Medoo;

class DatabaseFactory 
{
    private static $factory;
    private $db;

    public static function getFactory() 
    {
        if (!self::$factory) {
            self::$factory = new DatabaseFactory();
        }
        return self::$factory;
    }

    public function getConnection() 
    {

        if (!$this->db) {
            $this->db = new Medoo(Registry::get('application_data')['database']);
        }

        return $this->db;
    }
}
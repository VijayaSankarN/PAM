<?php

namespace LESP;

// Initializing configurations 
require_once 'config/config.php';

// Getting URL slug
$url = isset($_GET['url']) ? $_GET['url'] : "";

// Autoloader for classes
spl_autoload_register(function ($class_name) {
    $file = ROOT.'/config/lib/'.basename($class_name).'.php';

    if (file_exists($file)) {
        require_once($file);
    }
});

// Build configuration based on environment
$config = new Configuration();

// Set up Database Connection
$db = DatabaseFactory::getFactory()->getConnection();
Registry::set('db', $db);

// Start Application
$app = new Application();
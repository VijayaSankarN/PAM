<?php

namespace LESP;

require_once 'config/config.php';

$url = isset($_GET['url']) ? $_GET['url'] : "";

spl_autoload_register(function ($class_name) {
    $file = ROOT.'/config/lib/'.basename($class_name).'.php';

    if (file_exists($file)) {
        require_once($file);
    }
});

new Configuration();

$db = DatabaseFactory::getFactory()->getConnection();
Registry::set('db', $db);



// $app = new App();

// echo "<pre>";



// print_r(App::$database);
// print_r(App::$assets);
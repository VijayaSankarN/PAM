<?php

namespace PAM;


require_once './config/lib/app.php';

$app = new App();

echo "<pre>";



print_r(App::$database);
print_r(App::$assets);
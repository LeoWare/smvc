<?php

define("BASE_PATH", dirname(__FILE__) . "/../src");

// System and App directories (WITH trailing /)
define("SYSTEM_PATH", BASE_PATH . "/system/");
define("APP_PATH",    BASE_PATH . "/app/");

require("../src/system/classes/Autoload.php");

$loader = new \System\Autoload();

$loader->addNamespace('System', SYSTEM_PATH . "classes");
$loader->addNamespace('App', APP_PATH . "classes");
$loader->addNamespace('App\Controllers', APP_PATH . "controllers");
$loader->addNamespace('App\Models', APP_PATH . "models");
$loader->addNamespace('App\Models', APP_PATH . "models");
$loader->addNamespace('App\Models', APP_PATH . "models");

$loader->register();

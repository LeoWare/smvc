<?php
/**
 * This file loads the autoloading mechanism.
 */

// After this, we won't have to include class files again
require_once('classes/Autoload.php');

// spawn the loader
$loader = new \System\Autoload();

// register namespaces
$loader->addNamespace('System', SYSTEM_PATH . "classes");
$loader->addNamespace('App', APP_PATH . "classes");
$loader->addNamespace('App\Controllers', APP_PATH . "controllers");
$loader->addNamespace('App\Models', APP_PATH . "models");

$loader->register();

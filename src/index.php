<?php
/**
 * main application entry
 */

//--- System Configuration ---//

// Application base path
define("BASE_PATH", dirname(__FILE__));

// System and App directories (WITH trailing /)
define("SYSTEM_PATH", BASE_PATH . "/system/");
define("APP_PATH",    BASE_PATH . "/app/");
define("VIEWS_PATH",  APP_PATH  . "views/");

ini_set("display_errors", 1);
ini_set("error_logging", E_ALL & ~E_NOTICE);

//--- No Editing Below Here ---//

// Load the system config.php
require_once(SYSTEM_PATH . "config.php");

// Load the app config.php
require_once(APP_PATH . "config.php");

//--- Main Function --//

// Get the request info.
$request = new \System\Request($_SERVER);

// Dispatch the request.
// Router::route() returns true if request was handled
// or false if it can't dispatch the request
if(!$route->route($request)) {
    show_404();
}

// If we ended up here, everything was good.
// Exit with a good return code.
exit(0);

<?php
//--- Database Configuration --//

define("DB_HOST", "localhost");
define("DB_NAME", "project");
define("DB_USER", "project");
define("DB_PASS", '5F7Amb5kzVt4FdNK');


// $dsn = "mysql:dbname=" . DB_NAME . ";unix_socket=/run/mysqld/mysqld.sock";
// $dsn = "mysql:dbname=" . DB_NAME . ";host=" . DB_HOST . ";port=3306";

global $db;

try
{
    $db = new \System\Database\PDOMysqlDatabase(DB_NAME, DB_HOST, DB_USER, DB_PASS);
} catch (PDOException $e) {
    die($e->getMessage());
}

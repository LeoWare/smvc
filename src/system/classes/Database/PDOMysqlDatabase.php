<?php
/**
 *  Abstract Database class
 */

namespace System\Database;
/**
 *  Abstract Database class
 */
class PDOMysqlDatabase extends \System\Database
{
    private $pdo;
    private $db_name;
    private $host;
    private $user;
    private $password;


    public function __construct($db_name, $host, $user, $password)
    {
        $this->$db_name = $db_name;
        $this->$host = $host;
        $this->$user = $user;
        $this->$password = $password;

        $dsn = "mysql:dbname=$db_name;unix_socket=/run/mysqld/mysqld.sock";
        //$dsn = "mysql:dbname=" . DB_NAME . ";host=" . DB_HOST . ";port=3306";

        try {
            $this->pdo = new \PDO($dsn, $user, $password);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Connection failed: ' . $e->getMessage());
        }
    }

    public function query($query)
    {
        try
        {
            if($stmt = $this->pdo->query($query)) {
                return $stmt->fetchAll(\PDO::FETCH_ASSOC);
            } else {
                return false;
            }
        } catch (PDOException $e) {
            throw new Exception($e);
        }
    }

    public function prepare($query)
    {
        return $this->pdo->prepare($query);
    }

    public function getDBName()
    {
        return $this->db_name;
    }

    public function setDBName($value)
    {
        $this->db_name = $value;
    }

    public function getHost()
    {
        return $this->host;
    }

    public function setHost($value)
    {
        $this->host = $value;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($value)
    {
        $this->user = $value;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($value)
    {
        $this->password = $value;
    }
}

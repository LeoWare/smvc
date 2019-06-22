<?php
/**
 * This file contains the base Model class
 */

namespace App\Models;

/**
 * The base Model class
 */
class User extends \System\Model
{
    private $db;
    private $field;

    public function __construct(\System\Database $db)
    {
        parent::__construct();

        $this->db = $db;
    }

    public function getAll()
    {
        return $this->db->query("SELECT * FROM users");
    }

    public function __toString()
    {
        return __CLASS__;
    }
}

<?php

namespace Core\Database;

use \PDO;
use \PDOexception;
use \Core\Config;

/**
 * Database connection
 *
 */

class Connection
{
    protected static $instance;
    
    protected $pdo;

    public function __construct()
    {
        global $config;
        $pdoOptions  = array(
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_EMULATE_PREPARES   => FALSE,
        );
        $dsn = 'mysql:host='.$config['host'].';dbname='.$config['name'].';charset='.$config['charset'];
        $this->pdo = new PDO($dsn, $config['user'], $config['password'], $pdoOptions);
    }

    private function __clone(){}

    public static function instance()
    {
        try {
            if (self::$instance === null)
            {
                self::$instance = new self;
            }
            return self::$instance;
        } catch (PDOexception $error) {
            throw new PDOexception("Database Error: {$error}");
        }
    }
}

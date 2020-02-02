<?php

namespace Core\Provider;

use Core\Request\Request;
use Core\Provider\Provider;
use Core\Database\Connection;

class QueryAbstractProvider implements Provider
{
    private static function getDatabaseConnection()
    {
        return Connection::instance();
    }

    /**
     * bind PDO values
     *
     * @param PDO $statement
     * @param array $args
     *
     * @return PDO $statement
     */
    private static function bind($statement, $args)
    {
        $elements = sizeof($args);
        for ($i = 1; $i <= $elements; $i++) {
            $j = $i - 1;
            if (is_int($args[$j]) == true) {
                $statement->bindValue($i, $args[$j], \PDO::PARAM_INT);
            }
            if (is_string($args[$j]) == true) {
                $statement->bindValue($i, $args[$j], \PDO::PARAM_STR);
            }
        }
        return $statement;
    }

    /**
     * retrieving data from database by model name and query
     *
     * @param string $query
     * @param string $model
     * @param array $args
     *
     * @return PDO fetch data into model class
     */
    public static function data($query, $model, $args = [])
    {
        $db = self::getDatabaseConnection();
        $statement = $db->prepare($query);
        $statement = self::bind($statement, $args);
        $statement->execute();

        $data = $statement->fetchAll(\PDO::FETCH_CLASS, $model);
        return !empty($data) ? $data : null; 
    }

    public static function first($query, $model, $args = [])
    {
        $db = self::getDatabaseConnection();
        $statement = $db->prepare($query);
        $statement = self::bind($statement, $args);
        $statement->execute();

        $data = $statement->fetchAll(\PDO::FETCH_CLASS, $model);
        return !empty($data[0]) ? $data[0] : new $model;
    }
}

<?php

namespace Core\Provider;

use Core\Database\Connection;
use Core\Model\PrimaryModelInterface;
use Core\Model\UniqueModelInterface;

class QueryAbstractProvider
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

    /**
     * retrieving only one row by model name and query
     *
     * @param  mixed $query
     * @param  mixed $model
     * @param  mixed $args
     *
     * @return PDO fetch data into model class
     */
    public static function first($query, $model, $args = [])
    {
        $db = self::getDatabaseConnection();
        $statement = $db->prepare($query);
        $statement = self::bind($statement, $args);
        $statement->execute();

        $data = $statement->fetchAll(\PDO::FETCH_CLASS, $model);
        return !empty($data[0]) ? $data[0] : new $model;
    }

    /**
     * creating data by model
     *
     * @param  mixed $query
     * @param  mixed $model
     * @param  mixed $args
     *
     * @return PDO last inserted id with data
     */
    public static function insert($query, $model, $args = [])
    {
        $db = self::getDatabaseConnection();
        $result = self::creatorHelper($query, $args);
        $statement = $db->prepare($result['query']);
        $statement = self::bind($statement, $result['values']);
        $model = new $model;
        $result = $statement->execute();
        if(new $model instanceof UniqueModelInterface){
            if($result){
                return [
                    'success' => true,
                    $model::UNIQUE => $args[$model::UNIQUE]
                ];
            }
        } else {
            if($result){
                return [
                    'success' => true,
                    'id' => $db->lastInsertId()
                ];
            }
        }
    }

    /**
     * editing data by model
     *
     * @param  mixed $query
     * @param  mixed $model
     * @param  mixed $args
     *
     * @return nothing at this time
     */
    public static function update($query, $model, $args = [])
    {
        $db = self::getDatabaseConnection();
        if(new $model instanceof UniqueModelInterface){
            $result = self::updaterHelper($query, $args, $model::UNIQUE);
        } else {
            $result = self::updaterHelper($query, $args);
        }
        $statement = $db->prepare($result['query']);
        $statement = self::bind($statement, $result['values']);
        return ['success' => $statement->execute()];
    }

    /**
     * delete data by model
     *
     * @param  mixed $query
     * @param  mixed $model
     * @param  mixed $args
     *
     * @return boolean success or error
     */
    public static function delete($query, $model, $args = [])
    {
        $db = self::getDatabaseConnection();
        $statement = $db->prepare($query);
        $statement = self::bind($statement, $args);
        return $statement->execute(); 
    }

    /**
     * creatorHelper helps during creator actions
     *
     * @param  mixed $query
     * @param  mixed $args
     *
     * @return array [string $query, string $values]
     */
    public static function creatorHelper($query, $args){
        $keys = [];
        $values = [];
        foreach($args as $key => $value){
            if($key == 'id'){
                continue;
            }
            $keys[] = $key;
            $values[] = $value;
            $binders[] = '?';
        }
        $binders = implode(', ', $binders);
        $implodedKeys = implode(', ', $keys);
        $query .= " ($implodedKeys) ";
        $query .= " VALUES ($binders) ";
        return [
            'query' => $query,
            'values' => $values
        ];
    }

    /**
     * creatorHelper helps during editor actions
     *
     * @param  mixed $query
     * @param  mixed $args
     *
     * @return array [string $query, string $values]
     */
    public static function updaterHelper($query, $args, $uniqueKey = false){
        if(isset($args['id'])){
            $id = $args['id'];
            unset($args['id']);
        }
        $iterator = 1;
        $amount = count($args);
        $values = [];
        foreach($args as $key => $value){
            if($key == $uniqueKey){
                $uniqueKeyValue = $value;
            }
            $query .= " $key = ?";
            $values[] = $value;
            if($iterator != $amount){
                $query .= ", ";
            }
            $iterator++;
        }
        if($uniqueKey === false){
            $query .= " WHERE id = $id ";
        } else {
            $query .= " WHERE $uniqueKey = '$uniqueKeyValue' ";
        }
        return [
            'query' => $query,
            'values' => $values
        ];
    }
}

<?php

namespace App\Model;

/**
 * Home model
 *
 * PHP version 5.4
 */
class Home extends \Core\Model\AbstractModel
{
    /**
     * model table name
     *
     * @var string
     */
    protected $table = 'teachers';

    public $id;

    public $name;
    
    /**
     * get all school teachers from the teachers table
     *
     * @return array
     */
    public function getTeachers()
    {
        return self::data("SELECT * FROM teachers", __CLASS__);
    }
}

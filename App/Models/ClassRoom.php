<?php

namespace App\Model;

use Core\Model\AbstractModel;

/**
 * ClassRoom model
 *
 */
class ClassRoom extends AbstractModel 
{
    /**
     * model table name
     *
     * @var string
     */
    const TABLE = 'class_rooms';

    public $id;

    public $number;

    public $description;
    
    public $teachers;
}

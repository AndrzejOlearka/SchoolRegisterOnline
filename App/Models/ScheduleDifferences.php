<?php

namespace App\Model;

use Core\Model\AbstractModel;

/**
 * ScheduleDifferences model
 *
 */
class ScheduleDifferences extends AbstractModel 
{
    /**
     * model table name
     *
     * @var string
     */
    const TABLE = 'classes_schedule_differences';

    public $class_id;

    public $week;

    public $data;
}

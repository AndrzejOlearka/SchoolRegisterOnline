<?php

namespace App\Model;

use Core\Model\AbstractModel;

/**
 * ScheduleDefault model
 *
 */
class ScheduleDefault extends AbstractModel 
{
    /**
     * model table name
     *
     * @var string
     */
    const TABLE = 'classes_schedule_default';

    public $class_id;

    public $week;

    public $data;
}

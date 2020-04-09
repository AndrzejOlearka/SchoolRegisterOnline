<?php

namespace App\Model;

use Core\Model\AbstractModel;

/**
 * ScheduleDifferences model
 *
 */
class ClassSchedule extends AbstractModel 
{
    /**
     * model table name
     *
     * @var string
     */
    const TABLE = 'class_schedules';

    public $id;

    public $class_id;

    public $week;

    public $date_from;

    public $date_to;
}

<?php

namespace App\Model;

use Core\Model\AbstractModel;

/**
 * DefaultSchedule model
 *
 */
class DefaultSchedule extends AbstractModel 
{
    /**
     * model table name
     *
     * @var string
     */
    const TABLE = 'default_schedules';

    public $id;

    public $class_id;

    public $schedule;

    public $description;
}
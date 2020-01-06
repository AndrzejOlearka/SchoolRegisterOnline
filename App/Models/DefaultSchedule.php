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
    const TABLE = 'classes_schedule_default';

    public $class_id;

    public $monday;

    public $tuesday;

    public $wednesday;

    public $thursday;

    public $friday;

    public $saturday;

    public $sunday;
}

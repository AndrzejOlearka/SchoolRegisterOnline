<?php

namespace App\Model;

use Core\Model\AbstractModel;

/**
 * DefaultSchedule model
 *
 */
class SchoolWeek extends AbstractModel 
{
    /**
     * model table name
     *
     * @var string
     */
    const TABLE = 'school_weeks';

    public $week;

    public $date_from;

    public $date_to;
}
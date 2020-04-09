<?php

namespace App\Model;

use Core\Model\AbstractModel;
use Core\Model\UniqueModelInterface;

/**
 * SchoolDay model
 *
 */
class SchoolDay extends AbstractModel implements UniqueModelInterface
{
    /**
     * model table name
     *
     * @var string
     */
    const TABLE = 'school_days';

    const UNIQUE = 'day';

    public $day;

    public $week;

    public $date;

    public $weekday;
}

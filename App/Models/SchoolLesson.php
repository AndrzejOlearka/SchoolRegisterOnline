<?php

namespace App\Model;

use Core\Model\AbstractModel;

/**
 * SchoolLesson model
 *
 */
class SchoolLesson extends AbstractModel 
{
    /**
     * model table name
     *
     * @var string
     */
    const TABLE = 'school_lessons';

    public $number;

    public $date_start;

    public $date_end;
}

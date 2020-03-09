<?php

namespace App\Model;

use Core\Model\AbstractModel;
use Core\Model\UniqueModelInterface;

/**
 * SchoolLesson model
 *
 */
class SchoolLesson extends AbstractModel implements UniqueModelInterface
{
    /**
     * model table name
     *
     * @var string
     */
    const TABLE = 'school_lessons';

    const UNIQUE = 'number';

    public $number;

    public $date_start;

    public $date_end;
}

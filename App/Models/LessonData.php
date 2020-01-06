<?php

namespace App\Model;

use Core\Model\AbstractModel;

/**
 * LessonData model
 *
 */
class LessonData extends AbstractModel 
{
    /**
     * model table name
     *
     * @var string
     */
    const TABLE = 'lessons_data';

    public $class_id;

    public $week;

    public $data;
}

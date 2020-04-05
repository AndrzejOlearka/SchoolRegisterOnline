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

    public $id;

    public $class_id;

    public $school_day_id;

    public $subject;
    
    public $description;

    public $data;
}

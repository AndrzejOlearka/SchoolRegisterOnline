<?php

namespace App\Model;

use Core\Model\AbstractModel;

/**
 * LessonSubject model
 *
 */
class LessonSubject extends AbstractModel 
{
    /**
     * model table name
     *
     * @var string
     */
    const TABLE = 'lessons_subjects';

    public $id;

    public $class_id;

    public $school_subject_id;

    public $teacher_id;

    public $group_id;
}

<?php

namespace App\Model;

use Core\Model\AbstractModel;

/**
 * Grade model
 *
 */
class Grade extends AbstractModel 
{
    /**
     * model table name
     *
     * @var string
     */
    const TABLE = 'grades';

    public $id;

    public $weight;

    public $student_id;

    public $school_subject_id;

    public $teacher_id;

    public $group_id;

    public $native_grade_id;

    public $date;
}

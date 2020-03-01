<?php

namespace App\Model;

use Core\Model\AbstractModel;

/**
 * SemestralGrade model
 *
 */
class SemestralGrade extends AbstractModel 
{
    /**
     * model table name
     *
     * @var string
     */
    const TABLE = 'semestral_grades';

    public $student_id;

    public $grades;

    public $semestr;
}

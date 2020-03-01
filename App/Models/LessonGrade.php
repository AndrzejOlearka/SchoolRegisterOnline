<?php

namespace App\Model;

use Core\Model\AbstractModel;

/**
 * LessonGrade model
 *
 */
class LessonGrade extends AbstractModel 
{
    /**
     * model table name
     *
     * @var string
     */
    const TABLE = 'lesson_grades';

    const GRADETYPES_FOREIGN = 'grade_type_id';

    const STUDENTS_FOREIGN = 'student_id';

    const LESSON_GRADE_TYPE = '1';

    public $id;

    public $grade_id;

    public $student_id;

    public $school_subject_id;

    public $teacher_id;

    public $native_grade_id;

    public $created_date;

    public $updated_date;
}

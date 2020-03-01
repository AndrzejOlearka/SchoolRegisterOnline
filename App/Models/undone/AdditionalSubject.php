<?php

namespace App\Model;

use Core\Model\AbstractModel;
use Core\Model\PrimaryModelInterface;

/**
 * AdditionalSubject model
 *
 */
class AdditionalSubject extends AbstractModel implements PrimaryModelInterface
{
    /**
     * model table name
     *
     * @var string
     */
    const TABLE = 'additional_school_subjects';

    public $id;

    public $name;

    public $school_subject_id;

    public $teacher_id;
}

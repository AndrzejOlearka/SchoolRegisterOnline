<?php

namespace App\Model;

use Core\Model\AbstractModel;

/**
 * BehaviourNote model
 *
 */
class BehaviourNote extends AbstractModel 
{
    /**
     * model table name
     *
     * @var string
     */
    const TABLE = 'behaviour_notes';

    public $id;

    public $weight;

    public $student_id;

    public $teacher_id;

    public $date;
}

<?php

namespace App\Model;

use Core\Model\AbstractModel;

/**
 * BehaviourGradeType model
 *
 */
class BehaviourGradeType extends AbstractModel 
{
    /**
     * model table name
     *
     * @var string
     */
    const TABLE = 'behaviour_grades_types';

    public $id;

    public $tyoe;

    public $marks;

    public $weight;
}

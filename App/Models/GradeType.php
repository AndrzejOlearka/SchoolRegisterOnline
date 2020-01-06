<?php

namespace App\Model;

use Core\Model\AbstractModel;

/**
 * Grade model
 *
 */
class GradeType extends AbstractModel 
{
    /**
     * model table name
     *
     * @var string
     */
    const TABLE = 'grades_types';

    public $id;

    public $type;

    public $marks;

    public $weight;
}

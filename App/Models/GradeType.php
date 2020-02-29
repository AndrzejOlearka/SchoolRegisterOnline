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
    const TABLE = 'grade_types';

    public $id;

    public $mark;

    public $type;

    public $description;

    public $weight;
}

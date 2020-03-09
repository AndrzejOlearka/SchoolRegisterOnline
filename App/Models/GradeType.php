<?php

namespace App\Model;

use Core\Model\AbstractModel;
use Core\Model\PrimaryModelInterface;

/**
 * Grade model
 *
 */
class GradeType extends AbstractModel implements PrimaryModelInterface
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

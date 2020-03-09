<?php

namespace App\Model;

use Core\Model\AbstractModel;
use Core\Model\PrimaryModelInterface;

/**
 * SchoolClass model
 *
 */
class SchoolClass extends AbstractModel implements PrimaryModelInterface
{
    /**
     * model table name
     *
     * @var string
     */
    const TABLE = 'classes';

    public $id;

    public $number;

    public $department;

    public $class_tutor;

    public $profile;

    public $default_year;
}

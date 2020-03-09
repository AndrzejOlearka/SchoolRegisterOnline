<?php

namespace App\Model;

use Core\Model\AbstractModel;
use Core\Model\PrimaryModelInterface;

/**
 * Student model
 *
 */
class Student extends AbstractModel implements PrimaryModelInterface
{
    /**
     * model table name
     *
     * @var string
     */
    const TABLE = 'students';

    const CLASSES_FOREIGN = 'class_id';

    public $id;

    public $firstname;

    public $lastname;

    public $sex;

    public $class_id;

    public $birthday;

    public $father;

    public $mother;
}

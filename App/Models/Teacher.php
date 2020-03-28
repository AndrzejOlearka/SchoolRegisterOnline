<?php

namespace App\Model;

use Core\Model\AbstractModel;

/**
 * Home model
 *
 * PHP version 5.4
 */
class Teacher extends AbstractModel
{
    /**
     * model table name
     *
     * @var string
     */
    const TABLE = 'teachers';

    const USERS_FOREIGN = 'user_id';

    public $id;

    public $user_id;

    public $firstname;

    public $lastname;

    public $sex;

    public $school_subjects;

    public $class_tutor;
}

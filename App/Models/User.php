<?php

namespace App\Model;

use Core\Model\AbstractModel;

/**
 * Home model
 *
 * PHP version 5.4
 */
class User extends AbstractModel
{
    /**
     * model table name
     *
     * @var string
     */
    protected $table = 'users';

    public $id;

    public $email;

    public $password;

    public $role;

    public $verified;
}

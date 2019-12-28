<?php

namespace App\Model;

/**
 * Home model
 *
 * PHP version 5.4
 */
class User extends \Core\Model\AbstractModel
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

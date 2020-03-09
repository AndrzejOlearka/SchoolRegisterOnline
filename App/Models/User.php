<?php

namespace App\Model;

use Core\Model\AbstractModel;
use Core\Model\PrimaryModelInterface;

/**
 * User model
 *
 * PHP version 5.4
 */
class User extends AbstractModel implements PrimaryModelInterface
{
    /**
     * model table name
     *
     * @var string
     */
    const TABLE = 'users';

    public $id;

    public $email;

    public $password;

    public $role;

    public $verified;
}

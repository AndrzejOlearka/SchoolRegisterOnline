<?php

namespace App\Model;

use \Core\Request\Request;

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

    public $request;

    public $data;

    public $id;

    public $email;

    public $password;

    public $role;

    public $verified;

    Const VERIFIED = 0;

    Const ROLE = 0;
    
    /**
     * get all school teachers from the teachers table
     *
     * @return array
     */
    public function getUser(Request $request = null)
    {
        $this->request = Request::post()->get(['email', 'password']);
        $this->data = self::data("SELECT * FROM {$this->table}", __CLASS__, [$this->request->email]);
        return $this;
    }

    public function createUser()
    {
        self::data("INSERT INTO {$this->table} VALUES(?, ?, ".User::ROLE.", ".User::VERIFIED.")", __CLASS__, [$this->request->email, $this->request->password]);
    }
}

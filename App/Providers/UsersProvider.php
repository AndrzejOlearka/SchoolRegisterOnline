<?php

namespace App\Provider;

use App\Model\User;
use Core\Request\Request;
use Core\Provider\AbstractProvider;

class UsersProvider extends AbstractProvider
{
    private $model;
    private $table;
    
    const VERIFIED = 0;

    const ROLE = 0;

    public function __construct()
    {
        $this->model = 'App\\Model\\User';
        $this->table = 'users';
    }
    
    public function getUsers()
    {
        $this->originalData = self::data("SELECT * FROM {$this->table}", $this->model);
        return $this;
    }

    public function getUser()
    {
        $this->originalData = self::first("SELECT * FROM {$this->table} WHERE email = ?", $this->model, [$this->formData['email']]);
        return $this;
    }

    public function createUser()
    {
        self::data("INSERT INTO {$this->table} VALUES(null, ?, ?, ".UsersProvider::ROLE.", ".UsersProvider::VERIFIED.")", $this->model, [$this->formData['email'], $this->formData['password']]);
    }
}

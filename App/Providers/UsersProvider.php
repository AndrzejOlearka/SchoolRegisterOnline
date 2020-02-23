<?php

namespace App\Provider;

use App\Lib\Filters\UserFilter;
use Core\Provider\AbstractProvider;

class UsersProvider extends AbstractProvider
{
    private $model;
    private $table;

    public function __construct()
    {
        $this->model = 'App\\Model\\User';
        $this->table = 'users';
    }
    
    public function getUsers()
    {
        $filter = new UserFilter($this);
        $this->query ?: $this->query = $filter->usersTableFilter();
        $this->originalData = self::data("SELECT * FROM {$this->table}{$this->query}", $this->model);
        return $this;
    }

    public function getUser()
    {
        $filter = new UserFilter($this);
        $data = $filter->singleClassDetailsFilter();
        $this->prepareSingleResult($data, ['settings', 'data']);
        return $this;
    }

    public function addUser(){
        $this->originalData = self::insert("INSERT INTO {$this->table} ", $this->model, $this->getFormData());
        return $this;
    }

    public function editUser(){
        $this->originalData = self::update("UPDATE {$this->table} SET ", $this->model, $this->getFormData());
        return $this;
    }

    public function deleteUser(){
        $this->originalData = self::delete("DELETE FROM {$this->table} WHERE id = ?", $this->model, [$this->getFormData()['id']]);
        return $this;
    }
}

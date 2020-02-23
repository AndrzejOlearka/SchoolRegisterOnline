<?php

namespace App\Provider;

use App\Lib\Filters\TeachersFilter;
use Core\Provider\AbstractProvider;

class TeachersProvider extends AbstractProvider
{
    protected $model;
    protected $table;

    public function __construct()
    {
        $this->model = 'App\\Model\\Teacher';
        $this->table = $this->model::TABLE;
    }

    /**
     * return all classes with ids and basic data
     * no required fields or single optional element
     *
    */
    public function getTeachers()
    {
        $filter = new TeachersFilter($this);
        $this->query ?: $this->query = $filter->teachersTableFilter();
        $this->originalData = self::data("SELECT * FROM {$this->table}{$this->query}", $this->model);
        return $this;
    }
    
    public function getTeacher()
    {
        $filter = new TeachersFilter($this);
        //$data = $filter->singleClassDetailsFilter();
        //$this->prepareSingleResult($data, ['students', 'groups']);
        return $this;
    }

    public function addTeacher()
    {
        $this->originalData = self::insert("INSERT INTO {$this->table} ", $this->model, $this->getFormData());
        return $this;
    }

    public function editTeacher()
    {
        $this->originalData = self::update("UPDATE {$this->table} SET ", $this->model, $this->getFormData());
        return $this;
    }

    public function deleteTeacher()
    {
        $this->originalData = self::delete("DELETE FROM {$this->table} WHERE id = ?", $this->model, [$this->getFormData()['id']]);
        return $this;
    }
}
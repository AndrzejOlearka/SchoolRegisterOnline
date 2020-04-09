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

    public function getTeachers()
    {
        $filter = new TeachersFilter($this);
        $this->query ?: $this->query = $filter->teachersTableFilter();
        $this->originalData = $filter->setFilterData(self::data("SELECT * FROM {$this->table}{$this->query}", $this->model))->filterProcessing();
        return $this;
    }
    public function addTeacher()
    {
        $this->getResult(self::insert("INSERT INTO {$this->table} ", $this->model, $this->getFormData()));
        return $this;
    }

    public function editTeacher()
    {
        $this->getResult(self::update("UPDATE {$this->table} SET ", $this->model, $this->getFormData()));
        return $this;
    }

    public function deleteTeacher()
    {
        $this->originalData = self::delete("DELETE FROM {$this->table} WHERE id = ?", $this->model, [$this->getFormData()['id']]);
        return $this;
    }
}
<?php

namespace App\Provider;

use App\Lib\Filters\StudentFilter;
use Core\Provider\AbstractProvider;

class StudentsProvider extends AbstractProvider
{
    protected $model;
    protected $table;

    public function __construct()
    {
        $this->model = 'App\\Model\\Student';
        $this->table = $this->model::TABLE;
    }

    /**
     * return all classes with ids and basic data
     * no required fields or single optional element
     *
    */
    public function getStudents()
    {
        $filter = new StudentFilter($this);
        $this->query ?: $this->query = $filter->schoolClassesTableFilter();
        $this->originalData = self::data("SELECT * FROM {$this->table}{$this->query}", $this->model);
        return $this;
    }
    
    public function getStudent()
    {
        $filter = new StudentFilter($this);
        $data = $filter->singleClassDetailsFilter();
        $this->prepareSingleResult($data, ['students', 'groups']);
        return $this;
    }

    public function addStudent()
    {
        $this->originalData = self::insert("INSERT INTO {$this->table} ", $this->model, $this->getFormData());
        return $this;
    }

    public function editStudent()
    {
        $this->originalData = self::update("UPDATE {$this->table} SET ", $this->model, $this->getFormData());
        return $this;
    }

    public function deleteStudent()
    {
        $this->originalData = self::delete("DELETE FROM {$this->table} WHERE id = ?", $this->model, [$this->getFormData()['id']]);
        return $this;
    }
}
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

    public function getStudents()
    {
        $filter = new StudentFilter($this);
        $this->query ?: $this->query = $filter->studentsTableFilter();
        $this->originalData = $filter->setFilterData(self::data("SELECT * FROM {$this->table}{$this->query}", $this->model))->filterProcessing();
        return $this;
    }

    public function addStudent()
    {
        $this->getResult(self::insert("INSERT INTO {$this->table} ", $this->model, $this->getFormData()));
        return $this;
    }

    public function editStudent()
    {
        $this->getResult(self::update("UPDATE {$this->table} SET ", $this->model, $this->getFormData()));
        return $this;
    }

    public function deleteStudent()
    {
        $this->originalData = self::delete("DELETE FROM {$this->table} WHERE id = ?", $this->model, [$this->getFormData()['id']]);
        return $this;
    }
}

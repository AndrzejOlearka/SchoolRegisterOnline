<?php

namespace App\Provider;

use Core\Provider\AbstractProvider;
use App\Lib\Filters\ClassScheduleFilter;

class ClassSchedulesProvider extends AbstractProvider
{
    protected $model;
    protected $table;

    public function __construct()
    {
        $this->model = 'App\\Model\\ClassSchedule';
        $this->table = $this->model::TABLE;
    }

    public function getClassSchedules()
    {
        $filter = new ClassScheduleFilter($this);
        $this->query ?: $this->query = $filter->classScheduleFilter();
        $this->originalData = $filter->setFilterData(self::data("SELECT * FROM {$this->table}{$this->query}", $this->model))->filterProcessing();
        return $this;
    }

    public function addClassSchedule()
    {
        $this->getResult(self::insert("INSERT INTO {$this->table} ", $this->model, $this->getFormData()));
        return $this;
    }

    public function editClassSchedule()
    {
        $this->getResult(self::update("UPDATE {$this->table} SET ", $this->model, $this->getFormData()));
        return $this;
    }

    public function deleteClassSchedule()
    {
        $this->originalData = self::delete("DELETE FROM {$this->table} WHERE id = ?", $this->model, [$this->getFormData()['id']]);
        return $this;
    }
}

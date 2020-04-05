<?php

namespace App\Provider;

use App\Lib\Filters\SchoolDayFilter;
use Core\Provider\AbstractProvider;

class SchoolDaysProvider extends AbstractProvider
{
    public function __construct()
    {
        $this->model = 'App\\Model\\SchoolDay';
        $this->table = $this->model::TABLE;
    }

    public function getSchoolDays()
    {
        $filter = new SchoolDayFilter($this);
        $this->query ?: $this->query = $filter->schoolDayTableFilter();
        $this->originalData = $filter->setFilterData(self::data("SELECT * FROM {$this->table}{$this->query}", $this->model))->filterProcessing();
        return $this;
    }

    public function addSchoolDay()
    {
        $this->originalData = self::insert("INSERT INTO {$this->table} ", $this->model, $this->getFormData());
        return $this;
    }

    public function editSchoolDay()
    {
        $this->originalData = self::update("UPDATE {$this->table} SET ", $this->model, $this->getFormData());
        return $this;
    }

    public function deleteSchoolDay()
    {
        $this->originalData = self::delete("DELETE FROM {$this->table} WHERE ".$this->model::UNIQUE." = ?", $this->model, [$this->getFormData()[$this->model::UNIQUE]]);
        return $this;
    }
}

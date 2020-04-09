<?php

namespace App\Provider;

use Core\Provider\AbstractProvider;
use App\Lib\Filters\SchoolWeekFilter;

class SchoolWeeksProvider extends AbstractProvider
{
    protected $model;
    protected $table;

    public function __construct()
    {
        $this->model = 'App\\Model\\SchoolWeek';
        $this->table = $this->model::TABLE;
    }

    public function getSchoolWeeks()
    {
        $filter = new SchoolWeekFilter($this);
        $this->query ?: $this->query = $filter->schoolWeekFilter();
        $this->originalData = $filter->setFilterData(self::data("SELECT * FROM {$this->table}{$this->query}", $this->model))->filterProcessing();
        return $this;
    }

    public function addSchoolWeek()
    {
        $this->getResult(self::insert("INSERT INTO {$this->table} ", $this->model, $this->getFormData()));
        return $this;
    }

    public function editSchoolWeek()
    {
        $this->getResult(self::update("UPDATE {$this->table} SET ", $this->model, $this->getFormData()));
        return $this;
    }

    public function deleteSchoolWeek()
    {
        $this->originalData = self::delete("DELETE FROM {$this->table} WHERE id = ?", $this->model, [$this->getFormData()['id']]);
        return $this;
    }
}

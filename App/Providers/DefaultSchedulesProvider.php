<?php

namespace App\Provider;

use Core\Provider\AbstractProvider;
use App\Lib\Filters\DefaultScheduleFilter;

class DefaultSchedulesProvider extends AbstractProvider
{
    protected $model;
    protected $table;

    public function __construct()
    {
        $this->model = 'App\\Model\\DefaultSchedule';
        $this->table = $this->model::TABLE;
    }

    public function getDefaultSchedules()
    {
        $filter = new DefaultScheduleFilter($this);
        $this->query ?: $this->query = $filter->defaultScheduleFilter();
        $this->originalData = $filter->setFilterData(self::data("SELECT * FROM {$this->table}{$this->query}", $this->model))->filterProcessing();
        return $this;
    }

    public function addDefaultSchedule()
    {
        $this->getResult(self::insert("INSERT INTO {$this->table} ", $this->model, $this->getFormData()));
        return $this;
    }

    public function editDefaultSchedule()
    {
        $this->getResult(self::update("UPDATE {$this->table} SET ", $this->model, $this->getFormData()));
        return $this;
    }

    public function deleteDefaultSchedule()
    {
        $this->originalData = self::delete("DELETE FROM {$this->table} WHERE id = ?", $this->model, [$this->getFormData()['id']]);
        return $this;
    }
}

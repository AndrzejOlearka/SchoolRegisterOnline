<?php

namespace App\Provider;

use App\Lib\Filters\SchoolBreakFilter;
use Core\Provider\AbstractProvider;

class SchoolBreaksProvider extends AbstractProvider
{
    public function __construct()
    {
        $this->model = 'App\\Model\\SchoolBreak';
        $this->table = $this->model::TABLE;
    }

    public function getSchoolBreaks()
    {
        $filter = new SchoolBreakFilter($this);
        $this->query ?: $this->query = $filter->SchoolBreaksTableFilter();
        $this->originalData = $filter->setFilterData(self::data("SELECT * FROM {$this->table}{$this->query}", $this->model))->filterProcessing();
        return $this;
    }

    public function addSchoolBreak()
    {
        $this->originalData = self::insert("INSERT INTO {$this->table} ", $this->model, $this->getFormData());
        return $this;
    }

    public function editSchoolBreak()
    {
        $this->originalData = self::update("UPDATE {$this->table} SET ", $this->model, $this->getFormData());
        return $this;
    }

    public function deleteSchoolBreak()
    {
        $this->originalData = self::delete("DELETE FROM {$this->table} WHERE id = ?", $this->model, [$this->getFormData()['id']]);
        return $this;
    }
}

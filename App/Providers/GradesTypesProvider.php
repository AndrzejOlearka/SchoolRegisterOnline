<?php

namespace App\Provider;

use App\Lib\Filters\GradeTypeFilter;
use Core\Provider\AbstractProvider;

class GradeTypesProvider extends AbstractProvider
{
    public function __construct()
    {
        $this->model = 'App\\Model\\GradeType';
        $this->table = $this->model::TABLE;
    }

    public function getGradeTypes()
    {
        $filter = new GradeTypeFilter($this);
        $this->query ?: $this->query = $filter->GradeTypesTableFilter();
        $this->originalData = $filter->setFilterData(self::data("SELECT * FROM {$this->table}{$this->query}", $this->model))->filterProcessing();
        return $this;
    }

    public function addGradeType()
    {
        $this->originalData = self::insert("INSERT INTO {$this->table} ", $this->model, $this->getFormData());
        return $this;
    }

    public function editGradeType()
    {
        $this->originalData = self::update("UPDATE {$this->table} SET ", $this->model, $this->getFormData());
        return $this;
    }

    public function deleteGradeType()
    {
        $this->originalData = self::delete("DELETE FROM {$this->table} WHERE id = ?", $this->model, [$this->getFormData()['id']]);
        return $this;
    }
}

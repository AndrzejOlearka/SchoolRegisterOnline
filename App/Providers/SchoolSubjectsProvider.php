<?php

namespace App\Provider;

use App\Lib\Filters\SchoolSubjectFilter;
use Core\Provider\AbstractProvider;

class SchoolSubjectsProvider extends AbstractProvider
{
    public function __construct()
    {
        $this->model = 'App\\Model\\SchoolSubject';
        $this->table = $this->model::TABLE;
    }

    public function getSchoolSubjects()
    {
        $filter = new SchoolSubjectFilter($this);
        $this->query ?: $this->query = $filter->schoolSubjectsTableFilter();
        $this->originalData = $filter->setFilterData(self::data("SELECT * FROM {$this->table}{$this->query}", $this->model))->filterProcessing();
        return $this;
    }

    public function addSchoolSubject()
    {
        $this->originalData = self::insert("INSERT INTO {$this->table} ", $this->model, $this->getFormData());
        return $this;
    }

    public function editSchoolSubject()
    {
        $this->originalData = self::update("UPDATE {$this->table} SET ", $this->model, $this->getFormData());
        return $this;
    }

    public function deleteSchoolSubject()
    {
        $this->originalData = self::delete("DELETE FROM {$this->table} WHERE id = ?", $this->model, [$this->getFormData()['id']]);
        return $this;
    }
}

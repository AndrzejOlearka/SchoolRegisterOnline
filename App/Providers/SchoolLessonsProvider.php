<?php

namespace App\Provider;

use App\Lib\Filters\SchoolLessonFilter;
use Core\Provider\AbstractProvider;

class SchoolLessonsProvider extends AbstractProvider
{
    public function __construct()
    {
        $this->model = 'App\\Model\\SchoolLesson';
        $this->table = $this->model::TABLE;
    }

    public function getSchoolLessons()
    {
        $filter = new SchoolLessonFilter($this);
        $this->query ?: $this->query = $filter->SchoolLessonsTableFilter();
        $this->originalData = $filter->setFilterData(self::data("SELECT * FROM {$this->table}{$this->query}", $this->model))->filterProcessing();
        return $this;
    }

    public function addSchoolLesson()
    {
        $this->originalData = self::insert("INSERT INTO {$this->table} ", $this->model, $this->getFormData());
        return $this;
    }

    public function editSchoolLesson()
    {
        $this->originalData = self::update("UPDATE {$this->table} SET ", $this->model, $this->getFormData());
        return $this;
    }

    public function deleteSchoolLesson()
    {
        $this->originalData = self::delete("DELETE FROM {$this->table} WHERE ".$this->model::UNIQUE." = ?", $this->model, [$this->getFormData()[$this->model::UNIQUE]]);
        return $this;
    }
}

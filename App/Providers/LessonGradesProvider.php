<?php

namespace App\Provider;

use App\Lib\Filters\LessonGradeFilter;
use Core\Provider\AbstractProvider;

class LessonGradesProvider extends AbstractProvider
{
    public function __construct()
    {
        $this->model = 'App\\Model\\LessonGrade';
        $this->table = $this->model::TABLE;
    }

    public function getLessonGrades()
    {
        $filter = new LessonGradeFilter($this);
        $this->query ?: $this->query = $filter->LessonGradesTableFilter();
        $this->originalData = $filter->setFilterData(self::data("SELECT * FROM {$this->table}{$this->query}", $this->model))->filterProcessing();
        return $this;
    }

    public function addLessonGrade()
    {
        $this->originalData = self::insert("INSERT INTO {$this->table} ", $this->model, $this->getFormData());
        return $this;
    }

    public function editLessonGrade()
    {
        $this->originalData = self::update("UPDATE {$this->table} SET ", $this->model, $this->getFormData());
        return $this;
    }

    public function deleteLessonGrade()
    {
        $this->originalData = self::delete("DELETE FROM {$this->table} WHERE id = ?", $this->model, [$this->getFormData()['id']]);
        return $this;
    }
}

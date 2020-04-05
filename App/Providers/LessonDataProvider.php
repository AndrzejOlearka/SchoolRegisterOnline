<?php

namespace App\Provider;

use App\Lib\Filters\LessonDataFilter;
use Core\Provider\AbstractProvider;

class LessonDataProvider extends AbstractProvider
{
    protected $model;
    protected $table;

    public function __construct()
    {
        $this->model = 'App\\Model\\LessonData';
        $this->table = $this->model::TABLE;
    }

    public function getLessonDatas()
    {
        $filter = new LessonDataFilter($this);
        $this->query ?: $this->query = $filter->LessonDataTableFilter();
        $this->originalData = $filter->setFilterData(self::data("SELECT * FROM {$this->table}{$this->query}", $this->model))->filterProcessing();
        return $this;
    }

    public function addLessonData()
    {
        $this->originalData = self::insert("INSERT INTO {$this->table} ", $this->model, $this->getFormData());
        return $this;
    }

    public function editLessonData()
    {
        $this->originalData = self::update("UPDATE {$this->table} SET ", $this->model, $this->getFormData());
        return $this;
    }

    public function deleteLessonData()
    {
        $this->originalData = self::delete("DELETE FROM {$this->table} WHERE id = ?", $this->model, [$this->getFormData()['id']]);
        return $this;
    }
}

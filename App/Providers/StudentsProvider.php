<?php

namespace App\Provider;

use Core\Provider\AbstractProvider;

class StudentsProvider extends AbstractProvider
{
    protected $model;
    protected $table;

    public function __construct()
    {
        $this->model = 'App\\Model\\Student';
        $this->table = $this->model::TABLE;
    }

    public function getStudents(){
        //$filter = new StudentsFilter($this);
        //$this->query ?: $this->query = $filter->schoolClassesTableFilter();
        $this->originalData = self::data("SELECT * FROM {$this->table}{$this->query}", $this->model);
        return $this;
    }
}

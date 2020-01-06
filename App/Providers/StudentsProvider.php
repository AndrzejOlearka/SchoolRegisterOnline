<?php

namespace App\Provider;

use Core\Provider\AbstractProvider;

class StudentsProvider extends AbstractProvider
{
    private $model;
    private $table;

    public function __construct()
    {
        $this->model = 'App\\Model\\Student';
        $this->table = $this->model::TABLE;
    }

    public function getStudentGrades(){
        $gradesTable = \App\Model\Grade::TABLE;
        $this->originalData = self::data("SELECT * FROM {$this->table} LEFT JOIN {$gradesTable} ON {$this->table}.id = {$gradesTable}.student_id", $this->model);
        return $this;
    }
}

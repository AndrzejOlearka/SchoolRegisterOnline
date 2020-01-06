<?php

namespace App\Provider;

use Core\Provider\AbstractProvider;

class GradesProvider extends AbstractProvider
{
    private $model;
    private $table;

    public function __construct()
    {
        $this->model = 'App\\Model\\Grade';
        $this->table = $this->model::TABLE;
    }

    public function getGradeData(){

    }
}

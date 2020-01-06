<?php

namespace App\Provider;

use Core\Provider\AbstractProvider;

class ClassesProvider extends AbstractProvider
{
    private $model;
    private $table;

    public function __construct()
    {
        $this->model = 'App\\Model\\Trip';
        $this->table = $this->model::TABLE;
    }

    public function getTrips(){
        $this->originalData = self::data("SELECT * FROM {$this->table}", $this->model);
        return $this;
    }
}

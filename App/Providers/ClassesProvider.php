<?php

namespace App\Provider;

use App\Lib\Filters\ClassFilter;
use Core\Provider\AbstractProvider;

class ClassesProvider extends AbstractProvider
{
    private $model;
    private $table;
    private $classFilter;

    public function __construct()
    {
        $this->model = 'App\\Model\\SchoolClass';
        $this->table = $this->model::TABLE;
    }

    public function getClasses(){
        d($this);
        $this->classFilter = new ClassFilter($this->formData);
        $query = $this->classFilter->schoolClassesTableFilter();
        $this->originalData = self::data("SELECT * FROM {$this->table}{$query}", $this->model);
        return $this;
    }
    
    public function getClass(){
        $this->originalData = self::data("SELECT * FROM {$this->table} WHERE id = {$this->data['required']['id']}", $this->model);
        return $this;
    }
}

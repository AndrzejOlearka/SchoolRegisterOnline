<?php

namespace App\Provider;

use App\Lib\Filters\ClassFilter;
use Core\Provider\AbstractProvider;

class ClassesProvider extends AbstractProvider
{
    private $model;
    private $table;
    private $filters;

    public function __construct()
    {
        $this->model = 'App\\Model\\SchoolClass';
        $this->table = $this->model::TABLE;
    }

    /**
     * return all classes with ids and basic data
     * no required fields or single optional element
     * 
    */
    public function getClasses(){
        $this->filters['classes'] = new ClassFilter($this->formData);
        $query = $this->filters['classes']->schoolClassesTableFilter($this->optionalFields);
        $this->originalData = self::data("SELECT * FROM {$this->table}{$query}", $this->model);
        return $this;
    }
    
    public function getClass(){
        $this->originalData = self::data("SELECT * FROM {$this->table} WHERE id = {$this->data['required']['id']}", $this->model);
        return $this;
    }
}

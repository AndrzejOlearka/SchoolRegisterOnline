<?php

namespace App\Provider;

use App\Lib\Filters\ClassFilter;
use Core\Provider\AbstractProvider;

class ClassesProvider extends AbstractProvider
{
    protected $model;
    protected $table;

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
        $filter = new ClassFilter($this);
        $this->query ?: $this->query = $filter->schoolClassesTableFilter();
        $this->originalData = self::data("SELECT * FROM {$this->table}{$this->query}", $this->model);
        return $this;
    }
    
    public function getClass(){
        $filter = new ClassFilter($this);
        $filter->singleClassDetailsFilter();
       // $students = (new StudentsProvider)->getStudents();
       // $groups = (new GroupsProvider)->getGroups();
    }
}

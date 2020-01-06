<?php

namespace App\Provider;

use Core\Provider\AbstractProvider;

class ClassesProvider extends AbstractProvider
{
    private $model;
    private $table;

    public function __construct()
    {
        $this->model = 'App\\Model\\SchoolClass';
        $this->table = $this->model::TABLE;
    }

    public function getClasses(){
        
    }
    
    public function getClassWithStudentsNames(){
        $studentsTable = \App\Model\Student::TABLE;
        $this->originalData = self::data("SELECT * FROM {$this->table} LEFT JOIN {$studentsTable} ON {$this->table}.id = {$studentsTable}.class_id", $this->model);
        return $this;
    }

    public function getClassGroups(){
        $groupsTable = \App\Model\Group::TABLE;
        $this->originalData = self::data("SELECT * FROM {$this->table} LEFT JOIN {$groupsTable} ON {$this->table}.id = {$groupsTable}.class_id", $this->model);
        return $this;
    }

    public function getClassDefaultSchedule(){
        
    }

    public function getClassTrips(){
        
    }
}

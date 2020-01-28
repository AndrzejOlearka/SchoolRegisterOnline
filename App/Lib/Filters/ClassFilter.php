<?php

namespace App\Lib\Filters;

use App\Provider\ClassesProvider;

class ClassFilter 
{
    public function __construct(ClassesProvider $classes)
    {
        $this->data = $classes;
    }
    public function schoolClassesTableFilter(){
        $optionalFieldIterator = 0;
        $query = '';
        foreach($this->optionalFields as $key => $value){
            $value = $this->formData[$value];
            if($optionalFieldIterator == 0){
                $query .= " WHERE {$key} = {$value} ";
            } else {
                $query .= " AND {$key} = {$value} ";
            }
            $optionalFieldIterator++;
        }
        return $query;
    }

    public function classesDetailsFilter(){
      
    }
}

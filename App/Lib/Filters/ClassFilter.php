<?php

namespace App\Lib\Filters;

use Core\Request\Request;
use App\Provider\ClassesProvider;
use App\Provider\StudentsProvider;

class ClassFilter extends BasicFilter
{
    public function __construct(ClassesProvider $provider)
    {
        $this->provider = $provider;
    }
    
    public function schoolClassesTableFilter(){
        return parent::onlyOptionalFilter();
    }

    public function singleClassDetailsFilter(){
        $data = $this->provider->getFormData();
        if(!empty($data['with_students'])){
            $studentsProvider = new StudentsProvider;
            $studentsProvider
                ->setQuery(" WHERE class_id = {$data['id']}")
                ->getStudents()
                ->getOriginalData();
            dd($studentsProvider);
        }
        if(!empty($data['withGroups'])){
            //$groupsProvidewr = new GroupsProvider;
        }
    }
}

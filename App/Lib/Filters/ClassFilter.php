<?php

namespace App\Lib\Filters;

use App\Provider\ClassesProvider;
use App\Provider\StudentsProvider;
use Core\Providers\Filters\BasicFilter;

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
        $result = [];
        if(!empty($data['with_students'])){
            $studentsProvider = new StudentsProvider;
            $studentsProvider
                ->setQuery(" WHERE class_id = {$data['id']}")
                ->getStudents();
            $result['students'] = $studentsProvider->getOriginalData();
        }
        if(!empty($data['withGroups'])){
            //$groupsProvidewr = new GroupsProvider;
        }
        return $result;
    }
}

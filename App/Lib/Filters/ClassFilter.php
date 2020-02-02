<?php

namespace App\Lib\Filters;

use Core\Request\Request;
use App\Provider\ClassesProvider;

class ClassFilter extends BasicFilter
{
    public function __construct(Request $request)
    {
        $this->formData = $request;
    }
    
    public function schoolClassesTableFilter($optionalFields){
        parent::onlyOptionalFilter($optionalFields);
    }

    public function classesDetailsFilter(){
      
    }
}

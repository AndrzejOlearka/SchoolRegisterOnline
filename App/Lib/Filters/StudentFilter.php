<?php

namespace App\Lib\Filters;

use App\Provider\StudentsProvider;
use Core\Providers\Filters\BasicFilter;

class StudentFilter extends BasicFilter
{
    public function __construct(StudentsProvider $provider)
    {
        $this->provider = $provider;
    }
    
    public function schoolClassesTableFilter(){
        return parent::onlyOptionalFilter();
    }

    public function singleClassDetailsFilter(){

    }
}

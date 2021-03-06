<?php

namespace App\Lib\Filters;

use App\Provider\ClassesProvider;
use Core\Providers\Filters\BasicFilter;

class ClassFilter extends BasicFilter
{
    public function __construct(ClassesProvider $provider)
    {
        $this->provider = $provider;
        $this->filtering = false;
        $this->filters = [];
        $this->requestFilters();
    }

    public function schoolClassesTableFilter()
    {
        return parent::onlyOptionalFilter();
    }
}

<?php

namespace App\Lib\Filters;

use App\Provider\StudentsProvider;
use Core\Providers\Filters\BasicFilter;

class StudentFilter extends BasicFilter
{
    public function __construct(StudentsProvider $provider)
    {
        $this->provider = $provider;
        $this->filtering = false;
        $this->filters = [];
        $this->requestFilters();
    }

    public function studentsTableFilter()
    {
        return parent::onlyOptionalFilter();
    }
}

<?php

namespace App\Lib\Filters;

use App\Provider\SchoolDaysProvider;
use Core\Providers\Filters\BasicFilter;

class SchoolDayFilter extends BasicFilter
{
    public function __construct(SchoolDaysProvider $provider)
    {
        $this->provider = $provider;
        $this->filtering = false;
        $this->filters = [];
        $this->requestFilters();
    }

    public function schoolDayTableFilter()
    {
        return parent::onlyOptionalFilter();
    }
}

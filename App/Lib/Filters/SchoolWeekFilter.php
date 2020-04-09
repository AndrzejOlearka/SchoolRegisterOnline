<?php

namespace App\Lib\Filters;

use App\Provider\SchoolWeeksProvider;
use Core\Providers\Filters\BasicFilter;

class SchoolWeekFilter extends BasicFilter
{
    public function __construct(SchoolWeeksProvider $provider)
    {
        $this->provider = $provider;
        $this->filtering = false;
        $this->filters = [];
        $this->requestFilters();
    }

    public function schoolWeekFilter()
    {
        return parent::onlyOptionalFilter();
    }
}

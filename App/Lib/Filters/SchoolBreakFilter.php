<?php

namespace App\Lib\Filters;

use App\Provider\SchoolBreaksProvider;
use Core\Providers\Filters\BasicFilter;

class SchoolBreakFilter extends BasicFilter
{
    public function __construct(SchoolBreaksProvider $provider)
    {
        $this->provider = $provider;
        $this->filtering = false;
        $this->filters = [];
        $this->requestFilters();
    }

    public function SchoolBreaksTableFilter()
    {
        return parent::onlyOptionalFilter();
    }
}

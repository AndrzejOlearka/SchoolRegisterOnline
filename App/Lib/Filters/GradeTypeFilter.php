<?php

namespace App\Lib\Filters;

use App\Provider\GradeTypesProvider;
use Core\Providers\Filters\BasicFilter;

class GradeTypeFilter extends BasicFilter
{
    public function __construct(GradeTypesProvider $provider)
    {
        $this->provider = $provider;
        $this->filtering = false;
        $this->filters = [];
        $this->requestFilters();
    }

    public function GradeTypesTableFilter()
    {
        return parent::onlyOptionalFilter();
    }
}

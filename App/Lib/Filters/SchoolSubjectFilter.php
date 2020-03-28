<?php

namespace App\Lib\Filters;

use App\Provider\SchoolSubjectsProvider;
use Core\Providers\Filters\BasicFilter;

class SchoolSubjectFilter extends BasicFilter
{
    public function __construct(SchoolSubjectsProvider $provider)
    {
        $this->provider = $provider;
        $this->filtering = false;
        $this->filters = [];
        $this->requestFilters();
    }

    public function schoolSubjectsTableFilter()
    {
        return parent::onlyOptionalFilter();
    }
}

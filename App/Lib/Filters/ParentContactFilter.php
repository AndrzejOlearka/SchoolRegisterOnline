<?php

namespace App\Lib\Filters;

use App\Provider\ParentContactsProvider;
use Core\Providers\Filters\BasicFilter;

class ParentContactFilter extends BasicFilter
{
    public function __construct(ParentContactsProvider $provider)
    {
        $this->provider = $provider;
        $this->filtering = false;
        $this->filters = [];
        $this->requestFilters();
    }

    public function lessonGradesTableFilter()
    {
        return parent::onlyOptionalFilter();
    }
}

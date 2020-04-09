<?php

namespace App\Lib\Filters;

use App\Provider\ClassSchedulesProvider;
use Core\Providers\Filters\BasicFilter;

class ClassScheduleFilter extends BasicFilter
{
    public function __construct(ClassSchedulesProvider $provider)
    {
        $this->provider = $provider;
        $this->filtering = false;
        $this->filters = [];
        $this->requestFilters();
    }

    public function classScheduleFilter()
    {
        return parent::onlyOptionalFilter();
    }
}

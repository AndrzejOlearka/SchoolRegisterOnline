<?php

namespace App\Lib\Filters;

use App\Provider\DefaultSchedulesProvider;
use Core\Providers\Filters\BasicFilter;

class DefaultScheduleFilter extends BasicFilter
{
    public function __construct(DefaultSchedulesProvider $provider)
    {
        $this->provider = $provider;
        $this->filtering = false;
        $this->filters = [];
        $this->requestFilters();
    }

    public function defaultScheduleFilter()
    {
        return parent::onlyOptionalFilter();
    }
}

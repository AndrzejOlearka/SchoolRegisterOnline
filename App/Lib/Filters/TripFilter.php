<?php

namespace App\Lib\Filters;

use App\Provider\TripsProvider;
use Core\Providers\Filters\BasicFilter;

class TripFilter extends BasicFilter
{
    public function __construct(TripsProvider $provider)
    {
        $this->provider = $provider;
        $this->filtering = false;
        $this->filters = [];
        $this->requestFilters();
    }

    public function TripTableFilter()
    {
        return parent::onlyOptionalFilter();
    }
}

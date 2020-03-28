<?php

namespace App\Lib\Filters;

use App\Provider\RolesProvider;
use Core\Providers\Filters\BasicFilter;

class RoleFilter extends BasicFilter
{
    public function __construct(RolesProvider $provider)
    {
        $this->provider = $provider;
        $this->filtering = false;
        $this->filters = [];
        $this->requestFilters();
    }

    public function RolesTableFilter()
    {
        return parent::onlyOptionalFilter();
    }
}

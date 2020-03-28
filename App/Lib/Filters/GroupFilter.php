<?php

namespace App\Lib\Filters;

use App\Provider\GroupsProvider;
use Core\Providers\Filters\BasicFilter;

class GroupFilter extends BasicFilter
{
    public function __construct(GroupsProvider $provider)
    {
        $this->provider = $provider;
        $this->filtering = false;
        $this->filters = [];
        $this->requestFilters();
    }

    public function groupsTableFilter()
    {
        return parent::onlyOptionalFilter();
    }
}

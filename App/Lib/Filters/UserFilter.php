<?php

namespace App\Lib\Filters;

use App\Provider\UsersProvider;
use Core\Providers\Filters\BasicFilter;

class UserFilter extends BasicFilter
{
    public function __construct(UsersProvider $provider)
    {
        $this->provider = $provider;
        $this->filtering = false;
        $this->filters = [];
        $this->requestFilters();
    }

    public function usersTableFilter()
    {
        return parent::onlyOptionalFilter();
    }
}

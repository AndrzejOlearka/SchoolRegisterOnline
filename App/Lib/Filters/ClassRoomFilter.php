<?php

namespace App\Lib\Filters;

use App\Provider\ClassRoomsProvider;
use Core\Providers\Filters\BasicFilter;

class ClassRoomFilter extends BasicFilter
{
    public function __construct(ClassRoomsProvider $provider)
    {
        $this->provider = $provider;
        $this->filtering = false;
        $this->filters = [];
        $this->requestFilters();
    }

    public function classRoomFilter()
    {
        return parent::onlyOptionalFilter();
    }
}

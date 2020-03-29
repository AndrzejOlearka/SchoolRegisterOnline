<?php

namespace App\Lib\Filters;

use App\Provider\MessagesProvider;
use Core\Providers\Filters\BasicFilter;

class MessageFilter extends BasicFilter
{
    public function __construct(MessagesProvider $provider)
    {
        $this->provider = $provider;
        $this->filtering = false;
        $this->filters = [];
        $this->requestFilters();
    }

    public function MessagesTableFilter()
    {
        return parent::onlyOptionalFilter();
    }
}

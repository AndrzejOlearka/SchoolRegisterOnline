<?php

namespace App\Lib\Filters;

use App\Provider\NewsProvider;
use Core\Providers\Filters\BasicFilter;

class NewsFilter extends BasicFilter
{
    public function __construct(NewsProvider $provider)
    {
        $this->provider = $provider;
        $this->filtering = false;
        $this->filters = [];
        $this->requestFilters();
    }

    public function NewsTableFilter()
    {
        return parent::onlyOptionalFilter();
    }
}

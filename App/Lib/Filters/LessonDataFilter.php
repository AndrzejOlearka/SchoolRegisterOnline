<?php

namespace App\Lib\Filters;

use App\Provider\LessonDataProvider;
use Core\Providers\Filters\BasicFilter;

class LessonDataFilter extends BasicFilter
{
    public function __construct(LessonDataProvider $provider)
    {
        $this->provider = $provider;
        $this->filtering = false;
        $this->filters = [];
        $this->requestFilters();
    }

    public function lessonDataTableFilter()
    {
        return parent::onlyOptionalFilter();
    }
}

<?php

namespace App\Lib\Filters;

use App\Provider\SchoolLessonsProvider;
use Core\Providers\Filters\BasicFilter;

class SchoolLessonFilter extends BasicFilter
{
    public function __construct(SchoolLessonsProvider $provider)
    {
        $this->provider = $provider;
        $this->filtering = false;
        $this->filters = [];
        $this->requestFilters();
    }

    public function SchoolLessonsTableFilter()
    {
        return parent::onlyOptionalFilter();
    }
}

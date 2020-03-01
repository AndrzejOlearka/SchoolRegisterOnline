<?php

namespace App\Lib\Filters;

use App\Provider\LessonGradesProvider;
use Core\Providers\Filters\BasicFilter;

class LessonGradeFilter extends BasicFilter
{
    public function __construct(LessonGradesProvider $provider)
    {
        $this->provider = $provider;
        $this->filtering = false;
        $this->filters = [];
        $this->requestFilters();
    }

    public function lessonGradesTableFilter()
    {
        return parent::onlyOptionalFilter();
    }
}

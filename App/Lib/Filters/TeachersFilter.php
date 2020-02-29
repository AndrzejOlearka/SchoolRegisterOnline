<?php

namespace App\Lib\Filters;

use App\Provider\TeachersProvider;
use Core\Providers\Filters\BasicFilter;

class TeachersFilter extends BasicFilter
{
    public function __construct(TeachersProvider $provider)
    {
        $this->provider = $provider;
    }

    public function teachersTableFilter()
    {
        return parent::onlyOptionalFilter(['school_subjects']);
    }
}

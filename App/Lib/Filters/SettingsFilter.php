<?php

namespace App\Lib\Filters;

use App\Provider\SettingsProvider;
use Core\Providers\Filters\BasicFilter;

class SettingFilter extends BasicFilter
{
    public function __construct(SettingsProvider $provider)
    {
        $this->provider = $provider;
        $this->filtering = false;
        $this->filters = [];
        $this->requestFilters();
    }

    public function SettingsTableFilter()
    {
        return parent::onlyOptionalFilter();
    }
}

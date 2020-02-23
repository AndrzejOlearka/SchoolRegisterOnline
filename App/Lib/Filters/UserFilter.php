<?php

namespace App\Lib\Filters;

use App\Provider\UsersProvider;
use Core\Providers\Filters\BasicFilter;

class UserFilter extends BasicFilter
{
    public function __construct(UsersProvider $provider)
    {
        $this->provider = $provider;
    }
    
    public function usersTableFilter(){
        return parent::onlyOptionalFilter();
    }

    public function singleClassDetailsFilter(){
     
    }
}

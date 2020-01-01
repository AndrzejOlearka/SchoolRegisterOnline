<?php

namespace Core\Helpers;

class Header
{
    /**
     * redirection to other url or file
     *
     * @param string $location
     *
     */
    public static function redirect($location){
        header('Location: '.$location);	
    }
}

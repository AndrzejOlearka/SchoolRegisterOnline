<?php

namespace App\Lib\Validators;

trait StringValidator{

    function isAlpha($data){
        return ctype_alpha($data) ? true : false;
    }

    function isOnlyNumbersAndCommas($string){
        return preg_match('/^[0-9,]*$/', $string) == true ? true : false;
    }
}

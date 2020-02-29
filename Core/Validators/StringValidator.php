<?php

namespace App\Lib\Validators;

trait StringValidator{

    function isAlpha($data){
        return ctype_alpha($data) ? true : false;
    }

    function isValidJson($string) {
        json_decode($string);
        return json_last_error() == JSON_ERROR_NONE ? true : false;
    }

    function isOnlyNumbersAndCommas($string){
        return preg_match('/^[0-9,]*$/', $string) == true ? true : false;
    }

    function isAlphaNumeric($data){
        return ctype_alnum($data) ? true : false; 
    }
}

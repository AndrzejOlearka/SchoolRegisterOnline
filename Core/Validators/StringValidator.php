<?php

namespace App\Lib\Validators;

trait StringValidator{

    function isAlpha($data){
        return ctype_alpha($data);
    }

    function isValidJson($string) {
        json_decode($string);
        return json_last_error() == JSON_ERROR_NONE;
    }

    function isOnlyNumbersAndCommas($string){
        return preg_match('/^[0-9,]*$/', $string);
    }

    function isAlphaNumeric($data){
        return ctype_alnum($data); 
    }

    function isAlphaNumericAndBasicChars($data){
        return preg_match('/^[A-Za-z0-9_+-]*$/', $data); 
    }

    function sanitazeString($data){
        return filter_var($data, FILTER_SANITIZE_STRING);
    }

    function validateAndSantizeEmail($data){
        $email = filter_var($data, FILTER_SANITIZE_STRING);
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}

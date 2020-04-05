<?php

namespace App\Lib\Validators;

trait NumberValidator{

    function isInteger($data){
        $data = filter_var($data, FILTER_VALIDATE_INT);
        return is_int($data);
    }

    function isTinyInteger($data){
        return $data < 0 || $data > 255 ? false : true;
    }

    function isNotZero($data){
        return $data == 0 ? false : true;
    }

}

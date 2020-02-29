<?php

namespace App\Lib\Validators;

trait NumberValidator{

    function isInteger($data){
        $data = filter_var($data, FILTER_VALIDATE_INT);
        return is_int($data) ? true : false;
    }

}

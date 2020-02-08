<?php

namespace App\Lib\Validators;

trait NumberValidator{

    function isInteger($data){
        return is_int((int)$data) ? true : false;
    }

}

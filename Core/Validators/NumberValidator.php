<?php

namespace App\Lib\Validators;

trait NumberValidator{

    function isInteger($data){
        return ctype_alpha($data) ? true : false;
    }

}

<?php

namespace App\Lib\Validators;

trait StringValidator{

    function isAlpha($data){
        return ctype_alpha($data) ? true : false;
    }

}

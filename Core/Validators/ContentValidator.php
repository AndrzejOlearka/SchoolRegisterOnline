<?php

namespace App\Lib\Validators;

trait ContentValidator
{
    public function issetRow($data)
    {
        return empty($data) ? false : true;
    }

    public function compareRow($original, $compare)
    {
        if($original == $compare){
            return true;
        }
    }
}

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

    public function isBoolean($data)
    {
        return is_bool($data) ? true : false;
    }

    public function isPredefinedValue($data, $value){
        $i = 1;
        $predefiniedValues = [];
        for($i; $i < $value; $value++){
            $predefiniedValues[] = $i;
        }
        if(in_array($data, $predefiniedValues)){
            return false;
        }
        return true;
    }
}

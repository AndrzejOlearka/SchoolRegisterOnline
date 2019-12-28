<?php

namespace Core\Request\Validator;

class Validator 
{
    public static function __callStatic($name, $arguments = null)
    {
        $className = ucfirst($name);
        $requestClass = "Core\\Request\\Validator\\{$className}";
        return new $requestClass;
    }

    public function input($var, $const = null)
    {
        $var = filter_input($this->filterInput, $var, $const);
        if ($var) { 
            return $var;
        } else {
            return false;
        }
    } 
}
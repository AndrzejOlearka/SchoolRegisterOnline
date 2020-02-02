<?php

namespace Core\Request;

Class Request 
{
    public static function __callStatic($name, $arguments = null)
    {
        $className = ucfirst($name);
        $requestClass = "Core\\Request\\{$className}";
        $requestClass = new $requestClass;
        return $requestClass->get();
    }
}
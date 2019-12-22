<?php

namespace Core\Request;

Class JsonDecoder
{
    public function __callStatic($name, $arguments)
    {
        $className = ucfirst($name);
        if(is_object($name) && $name instanceof $className){
            
        }
    }
}
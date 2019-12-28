<?php

namespace Core\Request;

Class Request 
{
    public static function __callStatic($name, $arguments = null)
    {
        $className = ucfirst($name);
        $requestClass = "Core\\Request\\{$className}";
        return new $requestClass;
    }

    public function set($name, $value = null){
        $this->superglobal[$name] = $value;
        return $this;
    }

    public function get($args){
        if(is_array($args)){
            foreach($args as $key => $arg){
                $vars[$arg] = $this->superglobal[$arg];
            }
            return $vars;
        }
        return $this->superglobal[$args];
    }
}
<?php

namespace Core;

use Core\Session\Session;

/**
 * Base Action abstract class
 *
 */
abstract class AbstractAction
{
    protected function initSession(){
        $this->session = Session::instance();
    }

    protected function setSession($name, $value){
        $this->session->set($name, $value);
    }
    
    protected function setAdminSession($role, $name, $value){
        if($role == 0){
            $this->setSession($name, $value);        
        }
    }
}
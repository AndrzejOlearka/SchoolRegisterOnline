<?php

namespace Core\Request;

Class Get extends Request
{
    public $get;
    public function get(){
        $this->get = $_GET;
        return $this;
    }
}
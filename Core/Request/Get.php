<?php

namespace Core\Request;

Class Get extends Request
{
    public function get(){
        return $_GET;
    }
}
<?php

namespace Core\Request;

Class Post extends Request
{
    protected $superglobal;
    
    public function __construct()
    {
        $this->superglobal = $_POST;
    }
}
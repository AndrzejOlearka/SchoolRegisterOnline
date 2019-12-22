<?php

namespace Core\Request;

Class Get extends Request
{
    protected $superglobal;
    
    public function __construct()
    {
        $this->superglobal = $_GET;
    }
}
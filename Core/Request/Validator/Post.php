<?php

namespace Core\Request\Validator;

Class Post extends Validator
{
    protected $superglobal;
    
    public function __construct()
    {
        $this->filterInput = INPUT_POST;
    }
}
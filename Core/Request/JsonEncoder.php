<?php

namespace Core\Request;

Class JsonEncoder 
{
    public static function parse($data){
        echo json_encode($data);
        die;
    }
}
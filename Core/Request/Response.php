<?php

namespace Core\Request;

Class Response 
{
    /**
     * Send json response throught the API
     *
     * @param  mixed $data
     *
     * @return void
     */
    public static function json($data){
        echo json_encode($data);
        die;
    }
}
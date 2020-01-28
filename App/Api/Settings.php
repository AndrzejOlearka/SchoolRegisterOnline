<?php

namespace App\Controllers;

/**
 * Api settings endpoint controller
 */
class Students 
{
    public static function editSettings(){
        return [
            'type' => [
                'GET'
            ],
            'required' => [ 
                ''
            ], 
            'optional' => [
                'password', 'role'
            ]
        ];
    }
}
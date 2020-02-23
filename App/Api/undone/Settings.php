<?php

namespace App\Controllers;

/**
 * Api settings endpoint controller
 */
class Settings 
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
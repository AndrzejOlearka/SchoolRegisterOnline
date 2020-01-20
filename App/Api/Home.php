<?php

namespace App\Api;

/**
 * Api users endpoint controller
 */
class Home 
{
    public static function login(){
        return [
            'type' => [
                'POST'
            ],
            'required' => [
                'email', 'password'
            ], 
            'optional' => [

            ]
        ];
    }

    public static function register(){
        return [
            'type' => [
                'POST'
            ],
            'required' => [
                'email', 'password', 'password2'
            ], 
            'optional' => [

            ]
        ];
    }

    public static function getUsers(){
        return [
            'type' => [
                'GET', 'POST'
            ],
            'required' => [
                'id'
            ], 
            'optional' => [
                'role'
            ]
        ];
    }

    public static function getUserWithSettings(){
        return [
            'type' => [
                'GET', 'POST'
            ],
            'required' => [
                'email', 'password', 'password2'
            ], 
            'optional' => [
                
            ]
        ];
    }
}
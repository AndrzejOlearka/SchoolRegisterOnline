<?php

namespace App\Api;

use Core\View\View;
use Core\Request\Request;
use App\Provider\UsersProvider;
use App\Lib\{Registration, Authentication};
use Core\Controller\Controller;

/**
 * Api users endpoint controller
 */
class Users 
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
<?php

namespace App\Controllers;

/**
 * Api grades endpoint controller
 */
class News 
{
    public static function get(){
        return [
            'type' => [
                'GET'
            ],
            'required' => [ 
                
            ], 
            'optional' => [
                'id'
            ]
        ];
    }

    public static function add(){
        return [
            'type' => [
                'POST'
            ],
            'required' => [
                'name', 'description'
            ], 
            'optional' => [
                'user_id'
            ]
        ];
    }

    public static function edit(){
        return [
            'type' => [
                'POST'
            ],
            'required' => [
                'id'
            ], 
            'optional' => [
                'name', 'description'
            ]
        ];
    }

    public static function deleteGrade(){
        return [
            'type' => [
                'POST', 'DELETE'
            ],
            'required' => [
                'id'
            ], 
            'optional' => [

            ]
        ];
    }
}
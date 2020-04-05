<?php

namespace App\Api;

/**
 * Api ClassRooms endpoint controller
 */
class ClassRooms 
{
    public static function getClassRooms(){
        return [
            'type' => [
                'GET'
            ],
            'required' => [ 
                
            ], 
            'optional' => [
                'id', 'number', 'description', 'teachers'
            ]
        ];
    }

    public static function addClassRoom(){
        return [
            'type' => [
                'POST'
            ],
            'required' => [
                'number'
            ], 
            'optional' => [
                'description', 'teachers'
            ]
        ];
    }

    public static function editClassRoom(){
        return [
            'type' => [
                'POST'
            ],
            'required' => [
                'id', 'number'
            ], 
            'optional' => [
                'description', 'teachers'
            ]
        ];
    }

    public static function deleteClassRoom(){
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
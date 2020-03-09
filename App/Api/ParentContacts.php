<?php

namespace App\Api;

/**
 * Api users endpoint controller
 */
class ParentContacts 
{
    public static function getParentContact(){
        return [
            'type' => [
                'GET'
            ],
            'required' => [ 
                
            ], 
            'optional' => [
                'id', 'student_id', 'user_id', 'parent', 'email'
            ]
        ];
    }

    public static function addParentContact(){
        return [
            'type' => [
                'POST'
            ],
            'required' => [
                'student_id', 'parent'
            ], 
            'optional' => [
                'user_id', 'description', 'email'
            ]
        ];
    }

    public static function editParentContact(){
        return [
            'type' => [
                'POST'
            ],
            'required' => [
                'id'
            ], 
            'optional' => [
                'user_id', 'parent', 'description', 'email'
            ]
        ];
    }

    public static function deleteParentContact(){
        return [
            'type' => [
                'POST', 'DELETE'
            ],
            'required' => [
                'id', 
            ], 
            'optional' => [
                
            ]
        ];
    }
}
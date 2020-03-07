<?php

namespace App\Controllers;

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
                'id', 'student_id'
            ]
        ];
    }

    public static function addParentContact(){
        return [
            'type' => [
                'POST'
            ],
            'required' => [
                'student_id'
            ], 
            'optional' => [
                'parent', 'description', 'email'
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
                'parent', 'description', 'email'
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
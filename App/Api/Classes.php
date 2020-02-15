<?php

namespace App\Api;

/**
 * Api users endpoint controller
 */
class Classes 
{
    public static function getClasses(){
        return [
            'type' => [
                'GET'
            ],
            'required' => [

            ], 
            'optional' => [
                'class_tutor', 'profile_id', 'default_year', 'number', 'department'
            ]
        ];
    }
    
    public static function getClass(){
        return [
            'type' => [
                'GET'
            ],
            'required' => [
                'id'
            ], 
            'optional' => [
                'with_students', 'with_groups', 'with_schedule'
            ]
        ];
    }
        
    public static function addClass(){
        return [
            'type' => [
                'POST'
            ],
            'required' => [
                'number'
            ], 
            'optional' => [
                'department', 'class_tutor', 'profile_id', 'default_year'
            ]
        ];
    }
        
    public static function editClass(){
        return [
            'type' => [
                'POST'
            ],
            'required' => [
                'id'
            ], 
            'optional' => [
                'department', 'class_tutor', 'profile_id', 'default_year'
            ]
        ];
    }
        
    public static function deleteClass(){
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
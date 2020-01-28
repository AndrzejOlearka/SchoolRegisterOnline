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
                'DELETE'
            ],
            'required' => [
                'id'
            ], 
            'optional' => [
                
            ]
        ];
    }
}
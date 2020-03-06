<?php

namespace App\Api;

/**
 * Api Settings endpoint controller
 */
class Settings
{
    public static function getSettings(){
        return [
            'type' => [
                'GET'
            ],
            'required' => [ 
                
            ], 
            'optional' => [
                'id', 'name', 'role_id', 'description', 'value'
            ],
            'filters' => [
                'with_roles',
            ]
        ];
    }

    public static function addSetting(){
        return [
            'type' => [
                'POST'
            ],
            'required' => [
                'role_id', 'value'
            ], 
            'optional' => [
                'description', 'name'
            ]
        ];
    }
        
    public static function editSetting(){
        return [
            'type' => [
                'POST'
            ],
            'required' => [
                'id'
            ], 
            'optional' => [
                'role_id', 'name', 'description', 'value'
            ]
        ];
    }
        
    public static function deleteSetting(){
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
<?php

namespace App\Api;

/**
 * Api gradeTypes endpoint controller
 */
class GradeTypes
{
    public static function getGradeTypes(){
        return [
            'type' => [
                'GET'
            ],
            'required' => [ 
                
            ], 
            'optional' => [
                'id', 'mark', 'type', 'description', 'weight'
            ],
            'filters' => [
                
            ]
        ];
    }

    public static function addGradeType(){
        return [
            'type' => [
                'POST'
            ],
            'required' => [
                'mark', 'type'
            ], 
            'optional' => [
                'description', 'weight'
            ]
        ];
    }
        
    public static function editGradeType(){
        return [
            'type' => [
                'POST'
            ],
            'required' => [
                'id'
            ], 
            'optional' => [
                'mark', 'type', 'description', 'weight'
            ]
        ];
    }
        
    public static function deleteGradeType(){
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
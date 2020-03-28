<?php

namespace App\Api;

/**
 * Api SchoolLessons endpoint controller
 */
class SchoolLessons
{
    public static function getSchoolLessons(){
        return [
            'type' => [
                'GET'
            ],
            'required' => [ 
                
            ], 
            'optional' => [
                'number'
            ],
            'filters' => [
                
            ]
        ];
    }

    public static function addSchoolLesson(){
        return [
            'type' => [
                'POST'
            ],
            'required' => [
                'number'
            ], 
            'optional' => [
                'date_start', 'date_end'
            ]
        ];
    }
        
    public static function editSchoolLesson(){
        return [
            'type' => [
                'POST'
            ],
            'required' => [
                'number'
            ], 
            'optional' => [
                'date_start', 'date_end'
            ]
        ];
    }
        
    public static function deleteSchoolLesson(){
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
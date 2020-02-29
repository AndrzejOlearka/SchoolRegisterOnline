<?php

namespace App\Api;

/**
 * Api users endpoint controller
 */
class SchoolSubjects
{
    public static function getSchoolSubjects(){
        return [
            'type' => [
                'GET'
            ],
            'required' => [ 
                
            ], 
            'optional' => [
                'id', 'name'
            ],
            'filters' => [
                
            ]
        ];
    }

    public static function addSchoolSubject(){
        return [
            'type' => [
                'POST'
            ],
            'required' => [
                'name'
            ], 
            'optional' => [
                
            ]
        ];
    }
        
    public static function editSchoolSubject(){
        return [
            'type' => [
                'POST'
            ],
            'required' => [
                'id'
            ], 
            'optional' => [
                'name'
            ]
        ];
    }
        
    public static function deleteSchoolSubject(){
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
<?php

namespace App\Api;

/**
 * Api DefaultSchedules endpoint controller
 */
class DefaultSchedules
{
    public static function getDefaultSchedules(){
        return [
            'type' => [
                'GET'
            ],
            'required' => [ 
                
            ], 
            'optional' => [
                'number_id', 'monday', 'tue'
            ],
            'filters' => [
                
            ]
        ];
    }

    public static function addDefaultSchedule(){
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
        
    public static function editDefaultSchedule(){
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
        
    public static function deleteDefaultSchedule(){
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
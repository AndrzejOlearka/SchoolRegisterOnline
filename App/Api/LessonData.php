<?php

namespace App\Api;

/**
 * Api Datas endpoint controller
 */
class LessonDatas
{
    public static function getLessonDatas(){
        return [
            'type' => [
                'GET'
            ],
            'required' => [ 
                
            ], 
            'optional' => [
                'id', 'class_id', 'school_day_id', 'subject', 'description', 'data'
            ]
        ];
    }

    public static function addLessonData(){
        return [
            'type' => [
                'POST'
            ],
            'required' => [
                'class_id', 'school_day_id'
            ], 
            'optional' => [
                'subject', 'description', 'data'
            ]
        ];
    }


    public static function editLessonData(){
        return [
            'type' => [
                'POST'
            ],
            'required' => [
                'id', 'class_id', 'school_day_id'
            ], 
            'optional' => [
                'subject', 'description', 'data'
            ]
        ];
    }

    public static function deleteLessonData(){
        return [
            'type' => [
                'POST'
            ],
            'required' => [
                'id'
            ], 
            'optional' => [

            ]
        ];
    }
}
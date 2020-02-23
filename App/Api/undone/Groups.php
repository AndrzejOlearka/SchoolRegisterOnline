<?php

namespace App\Controllers;

/**
 * Api grades endpoint controller
 */
class Groups 
{
    public static function getGroups(){
        return [
            'type' => [
                'GET'
            ],
            'required' => [ 
                
            ], 
            'optional' => [
                'id', 'class_id', 'teacher_id'
            ]
        ];
    }

    public static function addGroup(){
        return [
            'type' => [
                'POST'
            ],
            'required' => [
                'name'
            ], 
            'optional' => [
                'class_id', 'teacher_id', 'school_subject_id'
            ]
        ];
    }

    public static function editGrade(){
        return [
            'type' => [
                'POST'
            ],
            'required' => [
                'id'
            ], 
            'optional' => [
                'class_id', 'teacher_id', 'school_subject_id'
            ]
        ];
    }

    public static function deleteGrade(){
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
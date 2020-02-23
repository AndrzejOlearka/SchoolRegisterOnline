<?php

namespace App\Controllers;

/**
 * Api grades endpoint controller
 */
class Grades 
{
    public static function getGrades(){
        return [
            'type' => [
                'GET'
            ],
            'required' => [ 
                
            ], 
            'optional' => [
                'student_id', 'class_id', 'school_subject_id', 'group_id'
            ]
        ];
    }

    public static function addGrade(){
        return [
            'type' => [
                'POST'
            ],
            'required' => [
                'student_id', 'school_subject_id', 'teacher_id'
            ], 
            'optional' => [
                'weight', 'group_id', 'native_grade_id', 'date'
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
                'weight', 'group_id', 'native_grade_id', 'date'
            ]
        ];
    }

    public static function deleteGrade(){
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

    public static function getSemestralGrade(){
        return [
            'type' => [
                'GET'
            ],
            'required' => [
                
            ], 
            'optional' => [
                'id', 'student_id', 'semestr', 'class_id', 'school_subject_id'
            ]
        ];
    }

    public static function editSemestralGrade(){
        return [
            'type' => [
                'POST'
            ],
            'required' => [
                'id'
            ], 
            'optional' => [
                'semestr', 'grade_type_id'
            ]
        ];
    }

    public static function deleteSemestralGrade(){
        return [
            'type' => [
                'GET'
            ],
            'required' => [
                'id'
            ], 
            'optional' => [
                
            ]
        ];
    }
}
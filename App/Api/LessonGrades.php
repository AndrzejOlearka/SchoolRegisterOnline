<?php

namespace App\Api;

/**
 * Api grades endpoint controller
 */
class LessonGrades
{
    public static function getLessonGrades(){
        return [
            'type' => [
                'GET'
            ],
            'required' => [ 
                
            ], 
            'optional' => [
                'id', 'student_id', 'class_id', 'school_subject_id', 'native_grade_id', 'created_date', 'updated_date'
            ]
        ];
    }

    public static function addLessonGrade(){
        return [
            'type' => [
                'POST'
            ],
            'required' => [
                'grade_type_id', 'student_id', 'school_subject_id', 'teacher_id', 'created_date'
            ], 
            'optional' => [

            ]
        ];
    }

    public static function addCorrectedLessonGrade(){
        return [
            'type' => [
                'POST'
            ],
            'required' => [
                'grade_type_id', 'student_id', 'school_subject_id', 'teacher_id', 'created_date', 'native_grade_id'
            ], 
            'optional' => [

            ]
        ];
    }

    public static function editLessonGrade(){
        return [
            'type' => [
                'POST'
            ],
            'required' => [
                'id', 'grade_type_id', 'updated_date'
            ], 
            'optional' => [
                
            ]
        ];
    }

    public static function editCorrectedLessonGrade(){
        return [
            'type' => [
                'POST'
            ],
            'required' => [
                'id', 'grade_type_id', 'updated_date'
            ], 
            'optional' => [
                
            ]
        ];
    }

    public static function deleteLessonGrade(){
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
<?php

namespace App\Controllers;

/**
 * Api users endpoint controller
 */
class Notes 
{
    public static function getNotes(){
        return [
            'type' => [
                'GET'
            ],
            'required' => [ 
                
            ], 
            'optional' => [
                'student_id', 'class_id', 'school_subject_id'
            ]
        ];
    }

    public static function addNote(){
        return [
            'type' => [
                'POST'
            ],
            'required' => [
                'student_id', 'teacher_id'
            ], 
            'optional' => [
                'weight', 'date'
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
                'weight', 'date'
            ]
        ];
    }

    public static function deleteNote(){
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

    
    public static function getSemestralNote(){
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

    public static function editSemestralNote(){
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

    public static function deleteSemestralNote(){
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
<?php

namespace App\Api;

/**
 * Api users endpoint controller
 */
class Students
{
    public static function getStudents()
    {
        return [
            'type' => [
                'GET',
            ],
            'required' => [

            ],
            'optional' => [
                'class_id', 'sex', 'firstname', 'lastname',
            ],
        ];
    }
    public static function getStudent()
    {
        return [
            'type' => [
                'GET',
            ],
            'required' => [
                'id',
            ],
            'optional' => [
                'with_grades', 'with_notes', 'with_contacts', 'with_groups', 'with_frequency',
            ],
        ];
    }

    public static function addStudent()
    {
        return [
            'type' => [
                'POST',
            ],
            'required' => [
                'class_id', 'firstname', 'lastname',
            ],
            'optional' => [
                'sex', 'birthday',
            ],
        ];
    }

    public static function editStudent()
    {
        return [
            'type' => [
                'POST',
            ],
            'required' => [
                'id',
            ],
            'optional' => [
                'firstname', 'lastname', 'sex', 'class_id', 'birthday', 'father', 'mother',
            ],
        ];
    }

    public static function deleteStudent()
    {
        return [
            'type' => [
                'POST', 'DELETE',
            ],
            'required' => [
                'id',
            ],
            'optional' => [

            ],
        ];
    }
}

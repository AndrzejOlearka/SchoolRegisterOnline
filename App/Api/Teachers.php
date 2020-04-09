<?php

namespace App\Api;

/**
 * Api users endpoint controller
 */
class Teachers
{
    public static function getTeachers()
    {
        return [
            'type' => [
                'GET',
            ],
            'required' => [

            ],
            'optional' => [
                'sex', 'school_subjects', 'class_tutor',
            ],
        ];
    }
    public static function getTeacher()
    {
        return [
            'type' => [
                'GET',
            ],
            'required' => [
                'id',
            ],
            'optional' => [
                'with_userdata', 'with_settings',
            ],
        ];
    }

    public static function addTeacher()
    {
        return [
            'type' => [
                'POST',
            ],
            'required' => [
                'user_id', 'firstname', 'lastname',
            ],
            'optional' => [
                'sex', 'school_subjects', 'class_tutor',
            ],
        ];
    }

    public static function editTeacher()
    {
        return [
            'type' => [
                'POST',
            ],
            'required' => [
                'id',
            ],
            'optional' => [
                'firstname', 'lastname', 'sex', 'class_tutor', 'school_subjects',
            ],
        ];
    }

    public static function deleteTeacher()
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

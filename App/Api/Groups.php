<?php

namespace App\Api;

/**
 * Api grades endpoint controller
 */
class Groups
{
    public static function getGroups()
    {
        return [
            'type' => [
                'GET',
            ],
            'required' => [

            ],
            'optional' => [
                'id', 'class_id', 'teacher_id', 'school_subject_id', 'name', 'students',
            ],
        ];
    }

    public static function addGroup()
    {
        return [
            'type' => [
                'POST',
            ],
            'required' => [
                'class_id', 'name',
            ],
            'optional' => [
                'teacher_id', 'school_subject_id', 'students',
            ],
        ];
    }

    public static function editGroup()
    {
        return [
            'type' => [
                'POST',
            ],
            'required' => [
                'id',
            ],
            'optional' => [
                'class_id', 'teacher_id', 'school_subject_id', 'students',
            ],
        ];
    }

    public static function deleteGroup()
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

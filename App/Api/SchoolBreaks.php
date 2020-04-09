<?php

namespace App\Api;

/**
 * Api SchoolBreaks endpoint controller
 */
class SchoolBreaks
{
    public static function getSchoolBreaks()
    {
        return [
            'type' => [
                'GET',
            ],
            'required' => [

            ],
            'optional' => [
                'number',
            ],
            'filters' => [

            ],
        ];
    }

    public static function addSchoolBreak()
    {
        return [
            'type' => [
                'POST',
            ],
            'required' => [
                'number',
            ],
            'optional' => [
                'date_start', 'date_end',
            ],
        ];
    }

    public static function editSchoolBreak()
    {
        return [
            'type' => [
                'POST',
            ],
            'required' => [
                'number',
            ],
            'optional' => [
                'date_start', 'date_end',
            ],
        ];
    }

    public static function deleteSchoolBreak()
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

<?php

namespace App\Api;

/**
 * Api grades endpoint controller
 */
class SchoolWeeks
{
    public static function getSchoolWeeks()
    {
        return [
            'type' => [
                'GET',
            ],
            'required' => [

            ],
            'optional' => [
                'week', 'date_from', 'date_to',
            ],
        ];
    }

    public static function addSchoolWeek()
    {
        return [
            'type' => [
                'POST',
            ],
            'required' => [
                'week', 'date_from', 'date_to',
            ],
            'optional' => [

            ],
        ];
    }

    public static function editSchoolWeek()
    {
        return [
            'type' => [
                'POST',
            ],
            'required' => [
                'week', 'date_from', 'date_to',
            ],
            'optional' => [

            ],
        ];
    }

    public static function deleteSchoolWeek()
    {
        return [
            'type' => [
                'POST',
            ],
            'required' => [
                'week',
            ],
            'optional' => [

            ],
        ];
    }
}

<?php

namespace App\Api;

/**
 * Api grades endpoint controller
 */
class SchoolDays
{
    public static function getSchoolDays()
    {
        return [
            'type' => [
                'GET',
            ],
            'required' => [

            ],
            'optional' => [
                'day', 'week', 'date', 'weekday',
            ],
        ];
    }

    public static function addSchoolDay()
    {
        return [
            'type' => [
                'POST',
            ],
            'required' => [
                'day', 'week', 'date', 'weekday',
            ],
            'optional' => [

            ],
        ];
    }

    public static function editSchoolDay()
    {
        return [
            'type' => [
                'POST',
            ],
            'required' => [
                'day', 'week', 'date', 'weekday',
            ],
            'optional' => [

            ],
        ];
    }

    public static function deleteSchoolDay()
    {
        return [
            'type' => [
                'POST',
            ],
            'required' => [
                'day',
            ],
            'optional' => [

            ],
        ];
    }
}

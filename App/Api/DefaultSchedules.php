<?php

namespace App\Api;

/**
 * Api DefaultSchedules endpoint controller
 */
class DefaultSchedules
{
    public static function getDefaultSchedules()
    {
        return [
            'type' => [
                'GET',
            ],
            'required' => [

            ],
            'optional' => [
                'id', 'class_id',
            ],
            'filters' => [

            ],
        ];
    }

    public static function addDefaultSchedule()
    {
        return [
            'type' => [
                'POST',
            ],
            'required' => [
                'class_id',
            ],
            'optional' => [
                'description', 'schedule',
            ],
        ];
    }

    public static function editDefaultSchedule()
    {
        return [
            'type' => [
                'POST',
            ],
            'required' => [
                'class_id',
            ],
            'optional' => [
                'description', 'schedule',
            ],
        ];
    }

    public static function deleteDefaultSchedule()
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

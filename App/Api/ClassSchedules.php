<?php

namespace App\Api;

/**
 * Api SchedulesDifferences endpoint controller
 */
class ClassSchedules
{
    public static function getClassSchedules()
    {
        return [
            'type' => [
                'GET',
            ],
            'required' => [

            ],
            'optional' => [
                'id', 'week', 'class_id',
            ],
            'filters' => [

            ],
        ];
    }

    public static function addClassSchedule()
    {
        return [
            'type' => [
                'POST',
            ],
            'required' => [
                'week', 'class_id',
            ],
            'optional' => [
                'schedule', 'description',
            ],
        ];
    }

    public static function editClassSchedule()
    {
        return [
            'type' => [
                'POST',
            ],
            'required' => [
                'id', 'week', 'class_id',
            ],
            'optional' => [
                'schedule', 'description',
            ],
        ];
    }

    public static function deleteClassSchedule()
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

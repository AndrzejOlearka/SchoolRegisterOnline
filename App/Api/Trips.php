<?php

namespace App\Api;

/**
 * Api users endpoint controller
 */
class Trips
{
    public static function getTrips()
    {
        return [
            'type' => [
                'GET',
            ],
            'required' => [

            ],
            'optional' => [
                'id', 'name',
            ],
        ];
    }

    public static function addTrip()
    {
        return [
            'type' => [
                'POST',
            ],
            'required' => [
                'name', 'teachers', 'date_from', 'date_to',
            ],
            'optional' => [
                'description', 'students', 'parents',
            ],
        ];
    }

    public static function editTrip()
    {
        return [
            'type' => [
                'POST',
            ],
            'required' => [
                'id', 'name', 'teachers', 'date_from', 'date_to',
            ],
            'optional' => [
                'description', 'students', 'parents',
            ],
        ];
    }

    public static function deleteTrip()
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

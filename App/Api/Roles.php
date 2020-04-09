<?php

namespace App\Api;

/**
 * Api Roles endpoint controller
 */
class Roles
{
    public static function getRoles()
    {
        return [
            'type' => [
                'GET',
            ],
            'required' => [

            ],
            'optional' => [
                'id', 'name', 'description',
            ],
            'filters' => [
                'with_users',
            ],
        ];
    }

    public static function addRole()
    {
        return [
            'type' => [
                'POST',
            ],
            'required' => [
                'name',
            ],
            'optional' => [
                'description',
            ],
        ];
    }

    public static function editRole()
    {
        return [
            'type' => [
                'POST',
            ],
            'required' => [
                'id',
            ],
            'optional' => [
                'name', 'description',
            ],
        ];
    }

    public static function deleteRole()
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

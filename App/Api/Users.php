<?php

namespace App\Api;

/**
 * Api users endpoint controller
 */
class Users
{
    public static function getUsers()
    {
        return [
            'type' => [
                'GET',
            ],
            'required' => [

            ],
            'optional' => [
                'role', 'verified',
            ],
        ];
    }

    public static function getUser()
    {
        return [
            'type' => [
                'GET',
            ],
            'required' => [

            ],
            'optional' => [
                'woth_settings', 'with_data',
            ],
        ];
    }

    public static function verifyUser()
    {
        return [
            'type' => [
                'POST',
            ],
            'required' => [
                'email', 'password',
            ],
            'optional' => [

            ],
        ];
    }

    public static function addUser()
    {
        return [
            'type' => [
                'POST',
            ],
            'required' => [
                'email', 'password',
            ],
            'optional' => [
                'role', 'verified',
            ],
        ];
    }

    public static function editUser()
    {
        return [
            'type' => [
                'POST',
            ],
            'required' => [
                'id',
            ],
            'optional' => [
                'email', 'role', 'verified', 'password',
            ],
        ];
    }

    public static function deleteUser()
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

<?php

namespace App\Api;

/**
 * Api grades endpoint controller
 */
class News
{
    public static function getAllNews()
    {
        return [
            'type' => [
                'GET',
            ],
            'required' => [

            ],
            'optional' => [
                'id',
            ],
        ];
    }

    public static function addNews()
    {
        return [
            'type' => [
                'POST',
            ],
            'required' => [
                'subject', 'content',
            ],
            'optional' => [
                'user_id', 'created_date',
            ],
        ];
    }

    public static function editNews()
    {
        return [
            'type' => [
                'POST',
            ],
            'required' => [
                'id',
            ],
            'optional' => [
                'subject', 'content', 'user_id', 'updated_date',
            ],
        ];
    }

    public static function deleteNews()
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

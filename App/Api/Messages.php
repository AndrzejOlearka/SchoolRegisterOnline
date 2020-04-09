<?php

namespace App\Api;

/**
 * Api messages endpoint controller
 */
class Messages
{
    public static function getMessages()
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

    public static function addMessage()
    {
        return [
            'type' => [
                'POST',
            ],
            'required' => [
                'subject', 'content', 'recipients',
            ],
            'optional' => [
                'user_id', 'template_id',
            ],
        ];
    }

    public static function editMessage()
    {
        return [
            'type' => [
                'POST',
            ],
            'required' => [
                'id',
            ],
            'optional' => [
                'subject', 'content', 'user_id', 'template_id', 'recipients',
            ],
        ];
    }

    public static function deleteMessage()
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

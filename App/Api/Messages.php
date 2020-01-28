<?php

namespace App\Controllers;

/**
 * Api messages endpoint controller
 */
class Message 
{
    public static function getMessage(){
        return [
            'type' => [
                'GET'
            ],
            'required' => [ 

            ], 
            'optional' => [
                'id', 'user_id'
            ]
        ];
    }
    public static function addMessage(){
        return [
            'type' => [
                'POST'
            ],
            'required' => [
                'user_id', 'subject', 'message'
            ], 
            'optional' => [
               'recipients_ids', 'template_id'
            ]
        ];
    }

    public static function deleteMessage(){
        return [
            'type' => [
                'POST', 'DELETE'
            ],
            'required' => [
                'id'
            ], 
            'optional' => [

            ]
        ];
    }
        
    public static function getTemplate(){
        return [
            'type' => [
                'GET'
            ],
            'required' => [
                
            ], 
            'optional' => [
               'id', 'name'
            ]
        ];
    }

    public static function addTemplate(){
        return [
            'type' => [
                'POST'
            ],
            'required' => [
                'name', 'message'
            ], 
            'optional' => [
                
            ]
        ];
    }
        
    public static function editTemplate(){
        return [
            'type' => [
                'POST'
            ],
            'required' => [
                'id'
            ], 
            'optional' => [
                'name', 'message'
            ]
        ];
    }
        
    public static function deleteTemplate(){
        return [
            'type' => [
                'POST', 'DELETE'
            ],
            'required' => [
                'id'
            ], 
            'optional' => [
                
            ]
        ];
    }
}
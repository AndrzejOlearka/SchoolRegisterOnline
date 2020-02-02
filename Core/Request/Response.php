<?php

namespace Core\Request;

Class Response 
{
    /**
     * Send json response throught the API
     *
     * @param  mixed $data
     *
     * @return void
     */
    public static function json($data, $message = null){
        $data = self::prepare($data, $message);
        echo json_encode($data);
        die;
    }

    /**
     * prepare response to readable
     *
     * @param  mixed $data
     *
     * @return void
     */
    public static function prepare($data, $message){
        $data == false ? $response['result'] = 'error' : $response['result'] = 'success';
        empty($message) ? $response['message'] = '' : $response['message'] = $message;
        is_null($data) ? $response['data'] = [] : $response['data'] = $data;
        return $response;
    }
}
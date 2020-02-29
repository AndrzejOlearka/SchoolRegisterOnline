<?php

namespace Core\Request;

use Core\Helpers\Header;

Class Response 
{
    /**
     * Send json response throught the API
     *
     * @param  mixed $data
     *
     * @return void
     */
    public static function json($data, $result = null, $errors = null){
        $data = self::prepare($data, $result, $errors);
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
    public static function prepare($data, $result, $errors){
        $result == false && $result !== null ? $response['result'] = 'error' : $response['result'] = 'success';
        is_null($data) ? $response['data'] = [] : $response['data'] = $data;
        if(!empty($errors)){
            $response['errors'] = $errors;
            Header::httpCode("HTTP/1.0 400 Bad API Request.");
            unset($response['data']);
        }
        return $response;
    }
}
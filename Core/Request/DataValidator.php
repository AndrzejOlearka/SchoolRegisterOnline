<?php

namespace Core\Request;

use Core\Helpers\Header;
use Core\Request\Response;
use Core\Controller\Controller;

Class DataValidator
{   
    public function setData(Controller $controller){
        $this->params = $controller->params;
    }

    public function process(){
        $this->checkRequestType()
             ->checkRequiredFields();
    }

    public function checkRequestType(){
        if(!in_array($this->params['requestMethod'], $this->params['apiData']['type'])){
            Header::httpCodeAndDie("HTTP/1.0 405 Request Method not allowed.");
        }
        return $this;
    }

    public function checkRequiredFields(){
        $emptyFields = [];
        foreach($this->params['apiData']['required'] as $requiredField){
            if(empty($this->params['formData'][$requiredField])){
                $emptyFields[] = $requiredField;
            }
        }
        if(!empty($emptyFields)){
            $this->sendResponseWithEmptyFields($emptyFields);
        }
        return $this;
    }

    private function sendResponseWithEmptyFields($emptyFields){
        $string = implode(', ', $emptyFields);
        Header::httpCode("HTTP/1.0 400 Missing required fields.");
        Response::json([
            'result' => 'error',
            'message' => 'Empty required fields: '.$string
        ]);
    }
}
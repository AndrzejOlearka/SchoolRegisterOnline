<?php

namespace Core\Request;

use Core\Helpers\Header;
use Core\Request\Response;
use Core\Controller\Controller;

Class DataValidator
{   
    
    public function setData(Controller $controller){
        $routeParams = $controller->getRouteParams();
        $this->data = $routeParams['data'];
        $this->data['id'] = $routeParams['id'];
        $this->method = $routeParams['request_method'];
        return $this;
    }

    public function process(){
        $this->checkRequestType()
             ->checkRequiredFields();
    }

    public function checkRequestType(){
        if(!in_array($this->method, $this->data['type'])){
            Header::httpCodeAndDie("HTTP/1.0 405 Method not allowed.");
        }
        return $this;
    }

    public function checkRequiredFields(){
        $emptyFields = [];
        dd($this->data);
        foreach($this->data['required'] as $requiredField){
            if(empty($_POST[$requiredField])){
                $emptyFields[] = $requiredField;
            }
        }
        if(!empty($emptyFields)){
            $string = implode(', ', $emptyFields);
            Header::httpCode("HTTP/1.0 400 Missing required fields.");
            Response::json(false, 'Empty required fields: '.$string);
        }
        return $this;
    }

    //private function setFormData
}
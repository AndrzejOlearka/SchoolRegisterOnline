<?php

namespace Core\Request;

use Core\Controller\Controller;

Class DataCreator
{   
    public function setData(Controller $controller){
        $routeParams = $controller->getRouteParams();
        $this->apiData = $routeParams['data'];
        $this->requestMethod = $routeParams['request_method'];
        $routeId = $routeParams['id'] ?? null;
        $this->setFormData($routeId);
        return $this;
    }

    public function getRequestMethod(){
        return $this->requestMethod;
    }

    public function getApiData(){
        return $this->apiData;
    }

    public function getFormData(){
        return $this->formData;
    }

    private function setFormData($id = null){
        switch($this->requestMethod){
            case 'GET':
                $this->formData = $_GET;
            case 'DELETE':
                $this->formData = $_POST;
                $this->formData['route_id'] = $id;
            case 'POST':
                $this->formData = $_POST;
            default:
                $this->formData = $_POST;
        }
        return $this;
    }
}
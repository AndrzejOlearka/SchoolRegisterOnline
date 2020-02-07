<?php

namespace Core\Provider;

use Core\Request\Request;

class AbstractProvider extends QueryAbstractProvider
{
    protected $params;
    protected $query;

    public function getFormData()
    {
        return $this->params['formData'];
    }

    public function getOriginalData()
    {
        return $this->originalData;
    }

    public function setParams($params)
    {
        $this->params = $params;
    }

    public function getOptionalFields(){
        return $this->params['apiData']['optional'];
    }

    public function getRequiredFields(){
        return $this->params['apiData']['required'];
    }

    public function setQuery($query){
        $this->query = $query;
        return $this;
    }

    public function getQuery(){
        return $this->query;
    }

    public function getModel(){
        return $this->model;
    }

    protected function prepareSingleResult($data, $table){
        foreach($table as $key => $single){
            if(!isset($data[$single])){
                continue;
            }
            $this->originalData[0]->$single = $data[$single];
        }
        return $this;
    }
}

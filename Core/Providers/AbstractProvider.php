<?php

namespace Core\Provider;

use Core\Request\Request;

class AbstractProvider extends QueryAbstractProvider
{
    protected $params;
    protected $formData;
    protected $originalData;
    protected $optionalFields;
    protected $requiredFields;

    public function getFormData()
    {
        return $this->formData;
    }

    public function getOriginalData()
    {
        return $this->originalData;
    }

    public function setParams($params)
    {
        $this->params = $params;
       
        $request = $this->setRequestType();

        $this
            ->setFormData(Request::$request())
            ->setOptionalFields()
            ->setRequiredFields();
    }

    public function setRequestType(){
        if(count($this->params['data']['type']) > 1){
            //???
            return strtolower($this->params['data']['type'][0]);
        } else {
            return strtolower($this->params['data']['type'][0]);
        }
    }

    public function setFormData($formData)
    {
        $this->formData = $formData;
        return $this;
    }

    public function setOptionalFields(){
        $this->optionalFields = $this->params['data']['optional'];
        return $this;
    }

    public function setRequiredFields(){
        $this->requiredFields = $this->params['data']['required'];
        return $this;
    }
}

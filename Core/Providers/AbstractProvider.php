<?php

namespace Core\Provider;

class AbstractProvider extends QueryAbstractProvider
{
    protected $params;
    protected $query;
    protected $model;
    protected $table;

    /**
     * getFormData
     *
     * @return array with formData params
     */
    public function getFormData()
    {
        return $this->params['formData'];
    }

    /**
     * setFormData
     *
     * @param array $formData 
     *
     * @return void
     */
    public function setFormData($formData)
    {
        $this->params['formData'] = $formData;
        return $this;
    }

    /**
     * getOriginalData
     *
     * @return array with models or single model
     */
    public function getOriginalData()
    {
        return $this->originalData;
    }

    /**
     * set params for provider (formData, apiData, OriginalData)
     *
     * @param  mixed $params
     *
     * @return void
     */
    public function setParams($params)
    {
        $this->params = $params;
        return $this;
    }

    /**
     * getOptionalFields
     *
     * @return array with optional api request fields
     */
    public function getOptionalFields(){
        return $this->params['apiData']['optional'];
    }

    /**
     * getRequiredFields
     *
     * @return array with required api request fields
     */
    public function getRequiredFields(){
        return $this->params['apiData']['required'];
    }

    /**
     * getFiltersFields
     *
     * @return array with required api request fields
     */
    public function getFiltersFields(){
        if(!array_key_exists('filters', $this->params['apiData'])){
            return [];
        }
        return $this->params['apiData']['filters'];
    }

    /**
     * setQuery custom query for provider 
     *
     * @param string $query
     *
     * @return void
     */
    public function setQuery($query){
        $this->query = $query;
        return $this;
    }

    /**
     * getQuery from provider
     *
     * @return string
     */
    public function getQuery(){
        return $this->query;
    }

    /**
     * getModel
     *
     * @return object of Model
     */
    public function getModel(){
        return $this->model;
    }
}

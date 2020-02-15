<?php

namespace Core\Controller;

use Core\Helpers\Header;
use Core\Session\Session;
use Core\Request\DataCreator;
use Core\Request\DataValidator;

/**
 * Base controller
 *
 */
abstract class Controller
{
    public $params;
    
    /**
     * Parameters from the matched route
     * @var array
     */
    protected $route_params = [];

    /**
     * Class constructor
     *
     * @param array $route_params  Parameters from the route
     *
     * @return void
     */
    public function __construct($route_params)
    {
        $this->route_params = $route_params;
        $this->creator = new DataCreator();
        $this->validator = new DataValidator();
    }

    /**
     * Call action of controller and check if method exists,
     * then validate api data
     * 
     *
     * @param string $name  Method name
     * @param array $args Arguments passed to the method
     *
     * @return void
     */
    public function __call($name, $args)
    {
        if (method_exists($this, $name)) {
            $this->dataProcess();
            $this->setDataProvider();
            call_user_func_array([$this, $name], $args);
        } else {
            Header::httpCodeAndDie("HTTP/1.0 404 Method does not exists.");
        }
    }

    protected function setDataProvider(){
        $namespace = "App\\Provider\\";
        $name = $this->getRouteParams()['controller']."Provider";
        $fullname = $namespace.$name;
        $this->provider = new $fullname;
        $this->provider->setParams($this->getParams());
        $this->clearData();
    }

    protected function dataProcess(){
        $this->setApiData();
        $this->validateApiData();
        return $this;
    }

    private function setApiData(){
        $this->creator->setData($this);
        $this->setData($this->creator);
    }

    private function setData(DataCreator $dataCreator){
        $this->params['requestMethod'] = $dataCreator->getRequestMethod();
        $this->params['apiData'] = $dataCreator->getApiData();
        $this->params['formData'] = $dataCreator->getFormData();
    }

    protected function validateApiData(){
        $this->validator->setData($this);
        $this->validator->process();
    }

    private function clearData(){
        unset($this->route_params);
        unset($this->validator);
        unset($this->creator);
        return $this;
    }

    public function getRouteParams(){
        return $this->route_params;
    }

    public function getParams(){
        return $this->params;
    }
}
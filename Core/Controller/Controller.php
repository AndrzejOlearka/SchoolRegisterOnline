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
            var_dump($name);
            Header::httpCodeAndDie("HTTP/1.0 404 Method does not exists.");
        }
    }

    /**
     * set Data Provider 
     * and set params from controller params
     * then clear data from route
     *
     * @return void
     */
    protected function setDataProvider(){
        $namespace = "App\\Provider\\";
        $name = ucfirst($this->getRouteParams()['controller'])."Provider";
        $fullname = $namespace.$name;
        $this->provider = new $fullname;
        $this->provider->setParams($this->getParams());
        $this->clearData();
    }

    /**
     * start process of validate data from api request
     *
     * @return void
     */
    protected function dataProcess(){
        $this->setApiData();
        $this->validateApiData();
        return $this;
    }

    /**
     * set data from api static settings
     *
     * @return void
     */
    private function setApiData(){
        $this->creator->setData($this);
        $this->setData($this->creator);
    }

    /**
     * setData
     *
     * @param DataCreator object
     *
     * prepare params for providers
     */
    private function setData(DataCreator $dataCreator){
        // API request method: for example GET, POST, DELETE 
        $this->params['requestMethod'] = $dataCreator->getRequestMethod();
        // API data: for example arrays with required, optional and filters fot this endpoint
        $this->params['apiData'] = $dataCreator->getApiData();
        // request form data: for example data from GET, POST superglobals or route params
        $this->params['formData'] = $dataCreator->getFormData();
        // controller name
        $this->params['controller'] = $this->getRouteParams()['controller'];
    }

    /**
     * process validate api data
     *
     * @return void
     */
    protected function validateApiData(){
        $this->validator->setData($this);
        $this->validator->process();
    }

    /**
     * delete root data from controller
     *
     * @return void
     */
    private function clearData(){
        unset($this->route_params);
        unset($this->validator);
        unset($this->creator);
        return $this;
    }

    /**
     * get route params from controller
     *
     * @return void
     */
    public function getRouteParams(){
        return $this->route_params;
    }

    /**
     * get validated data from controller
     *
     * @return void
     */
    public function getParams(){
        return $this->params;
    }
}
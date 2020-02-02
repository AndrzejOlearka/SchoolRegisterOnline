<?php

namespace Core\Controller;

use Core\Helpers\Header;
use Core\Session\Session;
use Core\Request\DataValidator;

/**
 * Base controller
 *
 */
abstract class Controller
{

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
        $this->validator = new DataValidator($this);
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
            dd($this);
            $this->dataValidation();
            $this->setFormData();
            $this->validateApiData();
            call_user_func_array([$this, $name], $args);
        } else {
            Header::httpCodeAndDie("HTTP/1.0 404 Method does not exists.");
        }
    }
    protected function dataValidation(){
        $this->validator->setRequestType();
        $this->validator->setFormData();
        $this->validator->setRequiredFields();
        return $this;
    }

    public function getRouteParams(){
        return $this->route_params;
    }


}
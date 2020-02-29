<?php

namespace Core;

use Core\Helpers\Header;

/**
 * Router
 *
 */
class Router
{
    /**
     * defined routes
     * @var array
     */
    const ROUTES = '../core/routes.php';

    /**
     * Associative array of routes (the routing table)
     * @var array
     */
    protected $routes = [];

    /**
     * Parameters from the matched route
     * @var array
     */
    protected $params = [];

    /**
     * current url
     * @var string
     */
    protected $url;

    /**
     * load routes from file
     *
     * @return void
     */

    /**
     * class Constructor
     * creating url from global $_SERVER['QUERY_STRING'] variable
     *
     * @return void
     */
    public function __construct()
    {
        $this->url = $_SERVER['QUERY_STRING'];
    }

    public function load()
    {

        require self::ROUTES;

        foreach ($routes as $route) {
            $this->add($route['route'], $route['params']);
        }

        return $this;
    }

    /**
     * Add a route to the routing table
     *
     * @param string $route  The route URL
     * @param array  $params Parameters (controller, action, etc.)
     *
     * @return void
     */

    public function add($route, $params = [])
    {
        // Convert the route to a regular expression: escape forward slashes
        $route = preg_replace('/\//', '\\/', $route);

        // Convert variables e.g. {controller}
        $route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z-]+)', $route);

        // Convert variables with custom regular expressions e.g. {id:\d+}
        $route = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)', $route);

        // Add start and end delimiters, and case insensitive flag
        $route = '/^' . $route . '$/i';

        $this->routes[$route] = $params;

        return $this;
    }

    /**
     * Match the route to the routes in the routing table, setting the $params
     * property if a route is found.
     *
     * @param string $this->url The route URL
     *
     * @return boolean  true if a match found, false otherwise
     */
    public function match()
    {
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $this->url, $matches)) {
                // Get named capture group values
                foreach ($matches as $key => $match) {
                    if (is_string($key)) {
                        $params[$key] = $match;
                    }
                }

                $this->params = $params;
                return true;
            }
        }

        return false;
    }

    /**
     * Dispatch the route, creating the controller object and running the
     * action method
     *
     * @param string $this->url The route URL
     *
     * @return void
     */
    public function dispatch()
    {
        $this->removeQueryStringVariables();

        if (!$this->match($this->url)) {
            Header::httpCodeAndDie("HTTP/1.0 404 No route matched.");
        }

        $controller = $this->params['controller'];
        $controller = $this->convertToStudlyCaps($controller);

        $action = $this->params['action'];
        $action = $this->convertToCamelCase($action);

        $apiClass = $this->getApiParamsNamespace() . $controller;

        if (!class_exists($apiClass) || !is_callable([$apiClass, $action])) {
            Header::httpCodeAndDie("HTTP/1.0 404 Method does not exists.");
        }

        $apiParams = $apiClass::$action();

        $controller = $this->getControllerNamespace() . $controller;

        if (!class_exists($controller)) {
            Header::httpCodeAndDie("HTTP/1.0 404 Method does not exists.");
        }

        $this->params['request_method'] = $_SERVER['REQUEST_METHOD'];
        $this->params['data'] = $apiParams;

        $controller_object = new $controller($this->params);

        if (!is_callable([$controller_object, $action])) {
            Header::httpCodeAndDie("HTTP/1.0 404 Method does not exists.");
        }

        /**
         * Get correct controller
         * Then get a view and the model
         */
        $controller_object->$action();
    }

    /**
     * Convert the string with hyphens to StudlyCaps,
     * e.g. post-authors => PostAuthors
     *
     * @param string $string The string to convert
     *
     * @return string
     */
    protected function convertToStudlyCaps($string)
    {
        $string = str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));
        return ucfirst($string);
    }

    /**
     * Convert the string with hyphens to camelCase,
     * e.g. add-new => addNew
     *
     * @param string $string The string to convert
     *
     * @return string
     */
    protected function convertToCamelCase($string)
    {
        return lcfirst($this->convertToStudlyCaps($string));
    }

    /**
     * Remove the query string variables from the URL (if any). As the full
     * query string is used for the route, any variables at the end will need
     * to be removed before the route is matched to the routing table.
     *
     * @return string The URL with the query string variables removed
     */
    protected function removeQueryStringVariables()
    {
        if ($this->url != '') {
            $parts = explode('&', $this->url, 2);

            if (strpos($parts[0], '=') === false) {
                $this->url = $parts[0];
            } else {
                $this->url = '';
            }
        }

        return $this;
    }

    /**
     * Get the namespace for the controller class. The namespace defined in the
     * route parameters is added if present.
     *
     * @return string The request URL
     */
    protected function getControllerNamespace()
    {
        $namespace = 'App\Controllers\\';

        if (array_key_exists('namespace', $this->params)) {
            $namespace .= $this->params['namespace'] . '\\';
        }

        return $namespace;
    }

    /**
     * Get the namespace for the data container for API
     *
     * @return string The request URL
     */
    protected function getApiParamsNamespace()
    {
        $namespace = 'App\\Api\\';

        return $namespace;
    }
}

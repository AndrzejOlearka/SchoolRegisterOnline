<?php

$routes =  [
    ['route' => 'api', 'params' => ['controller' => 'Home', 'action' => 'index']],
    ['route' => 'api/login', 'params' => ['controller' => 'Home', 'action' => 'login']],
    ['route' => 'api/register', 'params' => ['controller' => 'Home', 'action' => 'register']],
    ['route' => 'api/{controller}/{action}', 'params' => []],
    ['route' => 'api/{controller}', 'params' => ['action' => 'index']],
    ['route' => 'api/{controller}/{id:\d+}/{action}', 'params' => []],
    ['route' => 'api/admin/{controller}/{action}', 'params' => ['namespace' => 'Admin']]  
];
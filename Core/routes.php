<?php

$routes =  [
    ['route' => 'api/{controller}/{action}', 'params' => []],
    ['route' => 'api/{controller}', 'params' => ['action' => 'get']],
    ['route' => 'api/{controller}/{action}/{id:\d+}', 'params' => []],
    ['route' => 'api/admin/{controller}/{action}', 'params' => ['namespace' => 'Admin']]  
];
<?php

$routes =  [
    ['route' => '', 'params' => ['controller' => 'Home', 'action' => 'index']],
    ['route' => 'login', 'params' => ['controller' => 'Home', 'action' => 'login']],
    ['route' => '{controller}/{action}', 'params' => []],
    ['route' => '{controller}/{id:\d+}/{action}', 'params' => []],
    ['route' => 'admin/{controller}/{action}', 'params' => ['namespace' => 'Admin']]  
];
<?php

$routes =  [
    ['route' => '', 'params' => ['controller' => 'Home', 'action' => 'index']],
    ['route' => 'login', 'params' => ['controller' => 'Home', 'action' => 'login']],
    ['route' => 'register', 'params' => ['controller' => 'Home', 'action' => 'register']],
    ['route' => '{controller}/{action}', 'params' => []],
    ['route' => '{controller}/{id:\d+}/{action}', 'params' => []],
    ['route' => 'admin/{controller}/{action}', 'params' => ['namespace' => 'Admin']]  
];
<?php

require '../vendor/autoload.php';
require '../core/functions.php';

use Core\Config;
use Core\Router;

/**
 * Front controller
 *
 * Version 0.0.0
 */

$config = Config::get();

/**
 * Routing
 */
$router = new Router();
$router->load()->dispatch();
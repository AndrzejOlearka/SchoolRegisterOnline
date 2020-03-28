<?php

namespace App\Controllers;

use Core\Request\Response;
use Core\Controller\Controller;
use App\Lib\Actions\Roles\RoleEditor;
use App\Lib\Actions\Roles\RoleCreator;

/**
 * Roles controller
 *
 */
class Roles extends Controller
{
    /**
     * Get Roles with basic data
     *
     * @return void
     */
    protected function getRoles()
    {
        Response::json($this->provider->getRoles()->getOriginalData());
    }

    protected function addRole(){
        $action = new RoleCreator($this->provider);
        Response::json($action->create(), $action->getResult(), $action->getErrors());
    }

    protected function editRole(){
        $action = new RoleEditor($this->provider);
        Response::json($action->edit(), $action->getResult(), $action->getErrors());
    }
    
    protected function deleteRole(){
        Response::json($this->provider->deleteRole());
    }
}

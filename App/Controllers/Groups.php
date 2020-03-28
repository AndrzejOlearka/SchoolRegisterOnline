<?php

namespace App\Controllers;

use Core\Request\Response;
use Core\Controller\Controller;
use App\Lib\Actions\Groups\{GroupEditor, GroupCreator};

/**
 * Groups controller
 *
 */
class Groups extends Controller
{
    /**
     * Get classes with basic data
     *
     * @return void
     */
    protected function getGroups()
    {
        Response::json($this->provider->getGroups()->getOriginalData());
    }

    protected function addGroup(){
        $action = new GroupCreator($this->provider);
        Response::json($action->create(), $action->getResult(), $action->getErrors());
    }

    protected function editGroup(){
        $action = new GroupEditor($this->provider);
        Response::json($action->edit(), $action->getResult(), $action->getErrors());
    }
    
    protected function deleteGroup(){
        Response::json($this->provider->deleteGroup());
    }
}

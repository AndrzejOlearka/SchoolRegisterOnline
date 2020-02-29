<?php

namespace App\Controllers;

use Core\Request\Response;
use Core\Controller\Controller;
use App\Lib\Actions\Classes\{ClassEditor, ClassCreator};

/**
 * Classes controller
 *
 */
class Classes extends Controller
{
    /**
     * Get classes with basic data
     *
     * @return void
     */
    protected function getClasses()
    {
        Response::json($this->provider->getClasses()->getOriginalData());
    }

    protected function addClass(){
        $action = new ClassCreator($this->provider);
        Response::json($action->create(), $action->getResult(), $action->getErrors());
    }

    protected function editClass(){
        $action = new ClassEditor($this->provider);
        Response::json($action->edit(), $action->getResult(), $action->getErrors());
    }
    
    protected function deleteClass(){
        Response::json($this->provider->deleteClass());
    }
}

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

    protected function getClass()
    {
        $this->provider->setQuery(" WHERE id = {$this->provider->getFormData()['id']}")->getClasses();
        Response::json($this->provider->getClass()->getOriginalData());
    }

    protected function addClass(){
        $action = new ClassCreator($this->provider);
        $action->create();
    }

    protected function editClass(){
        $this->provider->getClasses();
        $action = new ClassEditor($this->provider);
        $action->edit();
    }
    
    protected function deleteClass(){
        Response::json($this->provider->deleteClass());
    }
}

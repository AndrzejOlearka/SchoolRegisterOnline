<?php

namespace App\Controllers;

use Core\Request\Response;
use Core\Controller\Controller;
use App\Provider\ClassesProvider;
use App\Lib\Actions\Classes\{ClassEditor, ClassCreator};

/**
 * Classes controller
 *
 */
class Classes extends Controller
{

    /**
     * Before filter
     *
     * @return void
     */
    protected function before()
    {}

    /**
     * After filter
     *
     * @return void
     */
    protected function after()
    {}

    /**
     * Get classes with basic data
     *
     * @return void
     */
    protected function getClasses()
    {
        $classesProvider = new ClassesProvider;
        $classesProvider->setParams($this->getParams());
        Response::json($classesProvider->getClasses()->getOriginalData());
    }

    protected function getClass()
    {
        $classesProvider = new ClassesProvider;
        $classesProvider->setParams($this->getParams());
        Response::json($classesProvider->getClasses()->getClass()->getOriginalData());
    }

    protected function addClass(){
        $classesProvider = new ClassesProvider;
        $classesProvider->setParams($this->getParams());
        $action = new ClassCreator($classesProvider);
        $action->create();
    }

    protected function editClass(){
        $classesProvider = new ClassesProvider;
        $classesProvider->setParams($this->getParams());
        $classesProvider->getClasses();
        $action = new ClassEditor($classesProvider);
        $action->edit();
    }
    
    protected function deleteClass(){
        $classesProvider = new ClassesProvider;
        $classesProvider->setParams($this->getParams());
        $classesProvider->deleteClass();
    }
}

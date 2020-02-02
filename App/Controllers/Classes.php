<?php

namespace App\Controllers;

use Core\Controller\Controller;
use App\Provider\ClassesProvider;
use Core\Request\Response;

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
        $classesProvider->setParams($this->getRouteParams());
        Response::json($classesProvider->getClasses()->getOriginalData());
    }

    protected function getClass()
    {
        $classes = new ClassesProvider;
        dd($this);
        $classesProvider->setParams($this->getRouteParams());
        $data = $classesProvider->getClass()->getOriginalData();
        dd($this);
        $students = (new StudentsProvider)->getStudents();
        $groups = (new GroupsProvider)->getGroups();
        $classes->classFilter->classesDetailsFilter($class, $students, $groups);
    }

}

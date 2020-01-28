<?php

namespace App\Controllers;

use Core\View\View;
use Core\Request\Request;
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
     * Show the index page
     *
     * @return void
     */
    protected function getClasses()
    {
        $classesProvider = new ClassesProvider;
        $classesProvider->setParams($this->getRouteParams());
        Response::json($classesProvider->getClasses()->getOriginalData());
    }

    protected function getClassWithStudents()
    {
        $classes = new ClassesProvider;
        $class = $classes->getClasses();
        $students = (new StudentsProvider)->getStudents();
        $groups = (new GroupsProvider)->getGroups();
        $classes->classFilter->classesDetailsFilter($class, $students, $groups);
    }

}

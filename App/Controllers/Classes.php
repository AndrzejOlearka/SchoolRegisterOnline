<?php

namespace App\Controllers;

use Core\View\View;
use Core\Request\Request;
use Core\Controller\Controller;

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
    public function getClasses()
    {
        (new ClassesProvider)->getClasses();
    }

    public function getClassWithStudents()
    {
        $classesProvider = new ClassesProvider;
        $usersProvider->setProviderData(Request::post()->get('class_id'))->getClassesWithStudents();
    }

    public function getClassWithGroups()
    {
        $classesProvider = new ClassesProvider;
        $usersProvider->setProviderData(Request::post()->get('class_id'))->getClassWithGroups();
    }

    public function getClassDefaultSchedule()
    {
        $classesProvider = new ClassesProvider;
        $usersProvider->setProviderData(Request::post()->get('class_id'))->getClassWithGroups();
    }

    public function getClassTrips()
    {
        $classesProvider = new ClassesProvider;
        $usersProvider->setProviderData(Request::post()->get('class_id'))->getClassTrips();
    }
}

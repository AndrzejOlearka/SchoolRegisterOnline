<?php

namespace App\Controllers;

use Core\View\View;
use Core\Request\Request;
use Core\Controller\Controller;

/**
 * Home controller
 *
 * PHP version 5.4
 */
class Settings extends Controller
{

    /**
     * Before filter
     *
     * @return void
     */
    protected function before()
    {
        //echo "(before) ";
        //return false;
    }

    /**
     * After filter
     *
     * @return void
     */
    protected function after()
    {
        //echo " (after)";
    }

    /**
     * Show the index page
     *
     * @return void
     */
    public function index()
    {
        $teachersProvider = (new TeachersProvider)->getTeacherData();
        View::render('home', $teacherData);
    }

    /**
     * Show the index page
     *
     * @return void
     */
    public function save()
    {
        $teachersProvider = new TeachersProvider;
        $teachersProvider->setFormData(Request::post()->get('teacherSettingForm'))->getUser();
        (new TeacherSettings($teachersProvider))->set();
    }
}

<?php

namespace App\Controllers;

use \App\Model as Model;
//use \Core\View;

/**
 * Home controller
 *
 * PHP version 5.4
 */
class Register extends \Core\Controller
{

    /**
     * Before filter
     *
     * @return void
     */
    protected function before()
    {

    }

    /**
     * After filter
     *
     * @return void
     */
    protected function after()
    {

    }

    /**
     * Show the index page
     *
     * @return void
     */
    public function index()
    {
        $teachers = new Model\Home;
        $dupa = $teachers->getTeachers();
        d($dupa[0]->id);
    }
}

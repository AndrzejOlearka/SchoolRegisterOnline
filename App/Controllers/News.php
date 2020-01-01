<?php

namespace App\Controllers;

use Core\View\View;
use App\Provider\UsersProvider;
use Core\Controller\Controller;

/**
 * Home controller
 *
 * PHP version 5.4
 */
class News extends Controller
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
        //View::render('news');
        $users = new UsersProvider;
        $users = $users->getUsersWithTeachers();
        View::render('news', ['users' => $users->originalData]);
    }
}

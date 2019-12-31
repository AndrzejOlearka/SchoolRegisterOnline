<?php

namespace App\Controllers;

use Core\View\View;
use Core\Request\Request;
use App\Provider\UsersProvider;
use App\Lib\{Registration, Authentication};
use Core\Controller\AdminController;

/**
 * Home controller
 *
 * PHP version 5.4
 */
class Panel extends AdminController
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
        $users = new UsersProvider;
        $users = $users->getUsers();
        View::render('home', $users);
    }

    public function deleteUser(){

    }

    public function addUser(){

    }

    public function updateUser(){

    }
}

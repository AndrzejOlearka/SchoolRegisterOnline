<?php

namespace App\Controllers;

use Core\View\View;
use App\Model as Model;
use App\Lib\{Registration, Authentication};

/**
 * Home controller
 *
 * PHP version 5.4
 */
class Home extends \Core\Controller
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
        View::render('home');
    }

    /**
     * Login action
     *
     * @return void
     */
    public function login()
    {
        (new Authentication(new Model\User))->validate();
    }
    
    /**
     * Login action
     *
     * @return void
     */
    public function register()
    {
        (new Registration(new Model\User))->validate();
    }
}

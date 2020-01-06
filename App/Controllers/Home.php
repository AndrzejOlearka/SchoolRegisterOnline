<?php

namespace App\Controllers;

use Core\View\View;
use Core\Request\Request;
use App\Provider\UsersProvider;
use App\Lib\{Registration, Authentication};
use Core\Controller\Controller;

/**
 * Home controller
 *
 * PHP version 5.4
 */
class Home extends Controller
{

    /**
     * Before filter
     *
     * @return void
     */
    protected function before(){}

    /**
     * After filter
     *
     * @return void
     */
    protected function after(){}

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
        $usersProvider = new UsersProvider;
        $usersProvider->setFormData(Request::post()->get('loginForm'))->getUser();
        (new Authentication($usersProvider))->validate();
    }
    
    /**
     * Login action
     *
     * @return void
     */
    public function register()
    {
        $usersProvider = new UsersProvider;
        $usersProvider->setFormData(Request::post()->get('registrationForm'))->getUser();
        (new Registration($usersProvider))->validate();
    }
}

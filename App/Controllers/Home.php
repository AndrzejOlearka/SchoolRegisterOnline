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
 */
class Home extends Controller
{
    protected function login()
    {
        $usersProvider = new UsersProvider;
        $usersProvider->formData = [
            'email' => $_POST['email'],
            'password' => $_POST['password']
        ];
        $usersProvider->getUser();
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

    /**
     * getUsers
     *
     * @return void
     */
    public function getUsers(){
        
    }

    /**
     * getUserWithSetttings
     *
     * @return void
     */
    public function getUserWithSetttings(){
        
    }
}

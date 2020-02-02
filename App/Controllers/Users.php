<?php

namespace App\Controllers;

use Core\View\View;
use Core\Request\Request;
use Core\Request\Response;
use App\Provider\UsersProvider;
use Core\Controller\Controller;
use App\Lib\Actions\Users\{Registration, Authentication};

/**
 * Users controller
 *
 */
class Users extends Controller
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
     * Login action
     *
     * @return void
     */
    protected function login()
    {
        $usersProvider = new UsersProvider;
        $usersProvider->setParams($this->getRouteParams());
        (new Authentication($usersProvider->getUser()))->validate();
    }
    
    /**
     * Login action
     *
     * @return void
     */
    public function register()
    {
        $usersProvider = new UsersProvider;
        $usersProvider->setParams($this->getRouteParams());
        (new Registration($usersProvider->getUser()))->validate();
    }

    /**
     * getUsers
     *
     * @return void
     */
    public function getUsers(){
        $usersProvider = new UsersProvider;
        $usersProvider->setParams($this->getRouteParams());
        Response::json($usersProvider->getUsers()->getOriginalData());
    }

    /**
     * getUserWithSetttings
     *
     * @return void
     */
    public function getUserWithSetttings(){
        
    }
}

<?php

namespace App\Controllers;

use Core\Request\Response;
use App\Provider\UsersProvider;
use Core\Controller\Controller;
use App\Lib\Actions\Users\{Registration, Authentication, UserEditor};

/**
 * Users controller
 *
 */
class Users extends Controller
{

    protected function getUsers(){
        Response::json($this->provider->getUsers()->getOriginalData());
    }

    protected function getUser(){
        $this->provider->setQuery(" WHERE id = {$this->provider->getFormData()['id']}")->getClasses();
        Response::json($this->provider->getClass()->getOriginalData());
    }

    protected function addUser(){
        $action = new Registration($this->provider);
        $action->create();
    }

    protected function verifyUser(){
        $action = new Authentication($this->provider);
        $action->verify();
    }

    protected function editUser(){
        $action = new UserEditor($this->provider);
        $action->edit();
    }

    protected function deleteUser(){
        Response::json($this->provider->deleteClass());
    }
}

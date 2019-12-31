<?php

namespace Core\Controller;

use Core\Session\Session;

/**
 * Base admin controller
 *
 */
abstract class AdminController extends Controller
{
    protected function before(){
        $this->isAdmin();
    }
    protected function after(){
        
    }

    private function isAdmin(){
        if(Session::get('admin')){
            throw new \Exception('No admins permissions recognized for this user.');
        }
    }
}
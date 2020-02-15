<?php

namespace App\Controllers;

use Core\Request\Response;
use Core\Controller\Controller;
use App\Lib\Actions\Students\{StudentEditor, StudentCreator};

/**
 * Students controller
 *
 */
class Students extends Controller
{
    protected function getStudents()
    {
        Response::json($this->provider->getStudents()->getOriginalData());
    }

    protected function getStudent()
    {
        $this->provider->setQuery(" WHERE id = {$this->provider->getFormData()['id']}")->getStudents();
        Response::json($this->provider->getStudent()->getOriginalData());
    }

    protected function addStudent(){
        $action = new StudentCreator($this->provider);
        $action->create();
    }

    protected function editStudent(){
        $this->provider->getStudents();
        $action = new StudentEditor($this->provider);
        $action->edit();
    }
    
    protected function deleteStudent(){
        Response::json($this->provider->deleteStudent());
    }
}

<?php

namespace App\Controllers;

use Core\Request\Response;
use Core\Controller\Controller;
use App\Lib\Actions\Students\{TeacherEditor, TeacherCreator};

/**
 * Teachers controller
 *
 */
class Teachers extends Controller
{
    protected function getTeachers()
    {
        Response::json($this->provider->getTeachers()->getOriginalData());
    }

    protected function getTeacher()
    {
        $this->provider->setQuery(" WHERE id = {$this->provider->getFormData()['id']}")->getTeachers();
        Response::json($this->provider->getTeacher()->getOriginalData());
    }

    protected function addTeacher(){
        $action = new TeacherCreator($this->provider);
        $action->create();
    }

    protected function editTeacher(){
        $this->provider->getTeachers();
        $action = new TeacherEditor($this->provider);
        $action->edit();
    }
    
    protected function deleteTeacher(){
        Response::json($this->provider->deleteStudent());
    }
}

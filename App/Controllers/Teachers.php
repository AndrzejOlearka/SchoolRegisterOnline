<?php

namespace App\Controllers;

use App\Lib\Actions\Students\TeacherCreator;
use App\Lib\Actions\Students\TeacherEditor;
use Core\Controller\Controller;use Core\Request\Response;

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
    
    protected function addTeacher()
    {
        $action = new TeacherCreator($this->provider);
        Response::json($action->create(), $action->getResult(), $action->getErrors());
    }

    protected function editTeacher()
    {
        $action = new TeacherEditor($this->provider);
        Response::json($action->edit(), $action->getResult(), $action->getErrors());
    }

    protected function deleteTeacher()
    {
        Response::json($this->provider->deleteStudent());
    }
}

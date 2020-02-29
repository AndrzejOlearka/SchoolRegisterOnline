<?php

namespace App\Controllers;

use App\Lib\Actions\Students\StudentCreator;
use App\Lib\Actions\Students\StudentEditor;
use Core\Controller\Controller;use Core\Request\Response;

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

    protected function addStudent()
    {
        $action = new StudentCreator($this->provider);
        Response::json($action->create(), $action->getResult(), $action->getErrors());
    }

    protected function editStudent()
    {
        $action = new StudentEditor($this->provider);
        Response::json($action->edit(), $action->getResult(), $action->getErrors());
    }

    protected function deleteStudent()
    {
        Response::json($this->provider->deleteStudent());
    }
}

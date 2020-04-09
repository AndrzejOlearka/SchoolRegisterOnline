<?php

namespace App\Controllers;

use Core\Request\Response;
use Core\Controller\Controller;
use App\Lib\Actions\ClassSchedules\{ClassScheduleEditor, ClassScheduleCreator};

/**
 * ClassSchedules controller
 *
 */
class ClassSchedules extends Controller
{
    /**
     * Get classes with basic data
     *
     * @return void
     */
    protected function getClassSchedules()
    {
        Response::json($this->provider->getClassSchedules()->getOriginalData());
    }

    protected function addClassSchedule(){
        $action = new ClassScheduleCreator($this->provider);
        Response::json($action->create(), $action->getResult(), $action->getErrors());
    }

    protected function editClassSchedule(){
        $action = new ClassScheduleEditor($this->provider);
        Response::json($action->edit(), $action->getResult(), $action->getErrors());
    }
    
    protected function deleteClassSchedule(){
        Response::json($this->provider->deleteClassSchedule());
    }
}

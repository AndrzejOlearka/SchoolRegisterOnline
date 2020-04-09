<?php

namespace App\Controllers;

use Core\Request\Response;
use Core\Controller\Controller;
use App\Lib\Actions\DefaultSchedules\{DefaultScheduleEditor, DefaultScheduleCreator};

/**
 * DefaultSchedules controller
 *
 */
class DefaultSchedules extends Controller
{
    /**
     * Get classes with basic data
     *
     * @return void
     */
    protected function getDefaultSchedules()
    {
        Response::json($this->provider->getDefaultSchedules()->getOriginalData());
    }

    protected function addDefaultSchedule(){
        $action = new DefaultScheduleCreator($this->provider);
        Response::json($action->create(), $action->getResult(), $action->getErrors());
    }

    protected function editDefaultSchedule(){
        $action = new DefaultScheduleEditor($this->provider);
        Response::json($action->edit(), $action->getResult(), $action->getErrors());
    }
    
    protected function deleteDefaultSchedule(){
        Response::json($this->provider->deleteDefaultSchedule());
    }
}

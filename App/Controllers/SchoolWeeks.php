<?php

namespace App\Controllers;

use Core\Request\Response;
use Core\Controller\Controller;
use App\Lib\Actions\SchoolWeeks\{SchoolWeekEditor, SchoolWeekCreator};

/**
 * SchoolWeeks controller
 *
 */
class SchoolWeeks extends Controller
{
    /**
     * Get classes with basic data
     *
     * @return void
     */
    protected function getSchoolWeeks()
    {
        Response::json($this->provider->getSchoolWeeks()->getOriginalData());
    }

    protected function addSchoolWeek(){
        $action = new SchoolWeekCreator($this->provider);
        Response::json($action->create(), $action->getResult(), $action->getErrors());
    }

    protected function editSchoolWeek(){
        $action = new SchoolWeekEditor($this->provider);
        Response::json($action->edit(), $action->getResult(), $action->getErrors());
    }
    
    protected function deleteSchoolWeek(){
        Response::json($this->provider->deleteSchoolWeek());
    }
}

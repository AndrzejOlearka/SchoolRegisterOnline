<?php

namespace App\Controllers;

use Core\Request\Response;
use Core\Controller\Controller;
use App\Lib\Actions\SchoolDays\{SchoolDayEditor, SchoolDayCreator};

/**
 * SchoolDay controller
 *
 */
class SchoolDays extends Controller
{
    /**
     * Get classes with basic data
     *
     * @return void
     */
    protected function getSchoolDays()
    {
        Response::json($this->provider->getSchoolDays()->getOriginalData());
    }

    protected function addSchoolDay(){
        $action = new SchoolDayCreator($this->provider);
        Response::json($action->create(), $action->getResult(), $action->getErrors());
    }

    protected function editSchoolDay(){
        $action = new SchoolDayEditor($this->provider);
        Response::json($action->edit(), $action->getResult(), $action->getErrors());
    }
    
    protected function deleteSchoolDay(){
        Response::json($this->provider->deleteSchoolDay());
    }
}

<?php

namespace App\Controllers;

use Core\Request\Response;
use Core\Controller\Controller;
use App\Lib\Actions\SchoolBreaks\SchoolBreakEditor;
use App\Lib\Actions\SchoolBreaks\SchoolBreakCreator;

/**
 * SchoolBreaks controller
 *
 */
class SchoolBreaks extends Controller
{
    /**
     * Get SchoolBreaks with basic data
     *
     * @return void
     */
    protected function getSchoolBreaks()
    {
        Response::json($this->provider->getSchoolBreaks()->getOriginalData());
    }

    protected function addSchoolBreak(){
        $action = new SchoolBreakCreator($this->provider);
        Response::json($action->create(), $action->getResult(), $action->getErrors());
    }

    protected function editSchoolBreak(){
        $action = new SchoolBreakEditor($this->provider);
        Response::json($action->edit(), $action->getResult(), $action->getErrors());
    }
    
    protected function deleteSchoolBreak(){
        Response::json($this->provider->deleteSchoolBreak());
    }
}

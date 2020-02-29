<?php

namespace App\Controllers;

use Core\Request\Response;
use Core\Controller\Controller;
use App\Lib\Actions\GradeTypes\GradeTypeEditor;
use App\Lib\Actions\GradeTypes\GradeTypeCreator;

/**
 * GradeTypes controller
 *
 */
class GradeTypes extends Controller
{
    /**
     * Get GradeTypes with basic data
     *
     * @return void
     */
    protected function getGradeTypes()
    {
        Response::json($this->provider->getGradeTypes()->getOriginalData());
    }

    protected function addGradeType(){
        $action = new GradeTypeCreator($this->provider);
        Response::json($action->create(), $action->getResult(), $action->getErrors());
    }

    protected function editGradeType(){
        $action = new GradeTypeEditor($this->provider);
        Response::json($action->edit(), $action->getResult(), $action->getErrors());
    }
    
    protected function deleteGradeType(){
        Response::json($this->provider->deleteGradeType());
    }
}

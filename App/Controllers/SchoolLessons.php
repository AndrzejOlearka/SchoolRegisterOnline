<?php

namespace App\Controllers;

use Core\Request\Response;
use Core\Controller\Controller;
use App\Lib\Actions\SchoolLessons\SchoolLessonEditor;
use App\Lib\Actions\SchoolLessons\SchoolLessonCreator;

/**
 * SchoolLessons controller
 *
 */
class SchoolLessons extends Controller
{
    /**
     * Get SchoolLessons with basic data
     *
     * @return void
     */
    protected function getSchoolLessons()
    {
        Response::json($this->provider->getSchoolLessons()->getOriginalData());
    }

    protected function addSchoolLesson(){
        $action = new SchoolLessonCreator($this->provider);
        Response::json($action->create(), $action->getResult(), $action->getErrors());
    }

    protected function editSchoolLesson(){
        $action = new SchoolLessonEditor($this->provider);
        Response::json($action->edit(), $action->getResult(), $action->getErrors());
    }
    
    protected function deleteSchoolLesson(){
        Response::json($this->provider->deleteSchoolLesson());
    }
}

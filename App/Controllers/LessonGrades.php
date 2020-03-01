<?php

namespace App\Controllers;

use Core\Request\Response;
use Core\Controller\Controller;
use App\Lib\Actions\LessonGrades\LessonGradeEditor;
use App\Lib\Actions\LessonGrades\LessonGradeCreator;

/**
 * LessonGrades controller
 *
 */
class LessonGrades extends Controller
{
    /**
     * Get LessonGrades with basic data
     *
     * @return void
     */
    protected function getLessonGrades()
    {
        Response::json($this->provider->getLessonGrades()->getOriginalData());
    }

    protected function addLessonGrade(){
        $action = new LessonGradeCreator($this->provider);
        Response::json($action->create(), $action->getResult(), $action->getErrors());
    }

    protected function addCorrectedLessonGrade(){}

    protected function editLessonGrade(){
        $action = new LessonGradeEditor($this->provider);
        Response::json($action->edit(), $action->getResult(), $action->getErrors());
    }

    protected function editCorrectedLessonGrade(){}
    
    protected function deleteLessonGrade(){
        Response::json($this->provider->deleteLessonGrade());
    }
}

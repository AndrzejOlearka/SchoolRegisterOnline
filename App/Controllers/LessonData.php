<?php

namespace App\Controllers;

use Core\Request\Response;
use Core\Controller\Controller;
use App\Lib\Actions\LessonDatas\{LessonDataEditor, LessonDataCreator};

/**
 * LessonDatas controller
 *
 */
class LessonDatas extends Controller
{
    /**
     * Get classes with basic data
     *
     * @return void
     */
    protected function getLessonDatas()
    {
        Response::json($this->provider->getLessonDatas()->getOriginalData());
    }

    protected function addLessonData(){
        $action = new LessonDataCreator($this->provider);
        Response::json($action->create(), $action->getResult(), $action->getErrors());
    }

    protected function editLessonData(){
        $action = new LessonDataEditor($this->provider);
        Response::json($action->edit(), $action->getResult(), $action->getErrors());
    }
    
    protected function deleteLessonData(){
        Response::json($this->provider->deleteLessonData());
    }
}

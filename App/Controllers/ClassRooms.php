<?php

namespace App\Controllers;

use Core\Request\Response;
use Core\Controller\Controller;
use App\Lib\Actions\ClassRooms\{ClassRoomEditor, ClassRoomCreator};

/**
 * ClassRooms controller
 *
 */
class ClassRooms extends Controller
{
    /**
     * Get classes with basic data
     *
     * @return void
     */
    protected function getClassRooms()
    {
        Response::json($this->provider->getClassRooms()->getOriginalData());
    }

    protected function addClassRoom(){
        $action = new ClassRoomCreator($this->provider);
        Response::json($action->create(), $action->getResult(), $action->getErrors());
    }

    protected function editClassRoom(){
        $action = new ClassRoomEditor($this->provider);
        Response::json($action->edit(), $action->getResult(), $action->getErrors());
    }
    
    protected function deleteClassRoom(){
        Response::json($this->provider->deleteClassRoom());
    }
}

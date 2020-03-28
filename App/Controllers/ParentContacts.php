<?php

namespace App\Controllers;

use Core\Request\Response;
use Core\Controller\Controller;
use App\Lib\Actions\ParentContacts\ParentContactEditor;
use App\Lib\Actions\ParentContacts\ParentContactCreator;

/**
 * ParentContacts controller
 *
 */
class ParentContacts extends Controller
{
    /**
     * Get ParentContacts with basic data
     *
     * @return void
     */
    protected function getParentContacts()
    {
        Response::json($this->provider->getParentContacts()->getOriginalData());
    }

    protected function addParentContact(){
        $action = new ParentContactCreator($this->provider);
        Response::json($action->create(), $action->getResult(), $action->getErrors());
    }

    protected function addCorrectedParentContact(){}

    protected function editParentContact(){
        $action = new ParentContactEditor($this->provider);
        Response::json($action->edit(), $action->getResult(), $action->getErrors());
    }

    protected function editCorrectedParentContact(){}
    
    protected function deleteParentContact(){
        Response::json($this->provider->deleteParentContact());
    }
}

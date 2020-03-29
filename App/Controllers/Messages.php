<?php

namespace App\Controllers;

use Core\Request\Response;
use Core\Controller\Controller;
use App\Lib\Actions\Messages\{MessageEditor, MessageCreator};

/**
 * Messages controller
 *
 */
class Messages extends Controller
{
    /**
     * Get classes with basic data
     *
     * @return void
     */
    protected function getMessages()
    {
        Response::json($this->provider->getMessages()->getOriginalData());
    }

    protected function addMessage(){
        $action = new MessageCreator($this->provider);
        Response::json($action->create(), $action->getResult(), $action->getErrors());
    }

    protected function editMessage(){
        $action = new MessageEditor($this->provider);
        Response::json($action->edit(), $action->getResult(), $action->getErrors());
    }
    
    protected function deleteMessage(){
        Response::json($this->provider->deleteMessage());
    }
}

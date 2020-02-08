<?php

namespace Core\Action;

use Core\Request\Response;

/**
 * Base Action interface
 *
 */
abstract class AbstractAction
{
    protected function setResult(){
        empty($this->errors) ? $this->result = true : $this->result = false;
        return $this;
    }

    protected function sendResult($message){
        if(!$this->result){
            Response::json(false, false, $this->errors);
        } else {
            Response::json($this->originalData, $message, null);
        }
    }
}
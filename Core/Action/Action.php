<?php

namespace Core\Action;

/**
 * Base Action interface
 *
 */
abstract class AbstractAction
{
    protected function setResult(){
        empty($this->errors) ? $this->result = true : $this->result = false;
    }
}
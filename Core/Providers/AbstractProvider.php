<?php

namespace Core\Provider;

use Core\Request\Request;
use Core\Database\Connection;

class AbstractProvider extends QueryAbstractProvider
{
    public $formData;
    public $originalData;

    public function setFormData($request)
    {
        $this->formData = $request;
        return $this;
    }
    public function getFormData()
    {
        return $this->formData;
    }
}

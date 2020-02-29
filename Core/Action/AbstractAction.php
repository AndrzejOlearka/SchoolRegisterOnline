<?php

namespace Core\Action;

use App\Lib\Validators\NumberValidator;
use App\Lib\Validators\StringValidator;
use App\Lib\Validators\ContentValidator;

/**
 * Base Action interface
 *
 */
abstract class AbstractAction
{
    use ContentValidator;
    use StringValidator;
    use NumberValidator;

    public $provider;
    protected $result;
    protected $formData;
    protected $originalData;
    protected $errors = [];

    /**
     * setResult
     *
     * @return void
     */
    protected function setResult()
    {
        empty($this->errors) ? $this->result = true : $this->result = false;
        return $this;
    }

    /**
     * get final result
     *
     * @return void
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * get request errors 
     *
     * @return void
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * send result to JSON Responder
     *
     * @return void
     */
    protected function sendResult()
    {
        return $this->originalData;
    }

    /**
     * get data of API Request
     *
     * @return void
     */
    public function getFormData()
    {
        return $this->formData;
    }
}

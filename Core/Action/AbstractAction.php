<?php

namespace Core\Action;

use App\Lib\Validators\ContentValidator;
use App\Lib\Validators\NumberValidator;
use App\Lib\Validators\StringValidator;

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
    protected $unique;

    /**
     * setResult
     *
     * @param boolean $error
     *
     * @return void
     */
    protected function setResult($error = true)
    {
        empty($this->errors) || !$error ? $this->result = true : $this->result = false;
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

    /**
     * set unique for queries
     *
     * @return void
     */
    protected function setUnique()
    {
        $model = $this->provider->getModel();
        if (defined("{$model}::CONSTANT_NAME")) {
            $this->unique = $model::UNIQUE;
        } else {
            $this->unique = 'id';
        }
        return $this;
    }

    protected function isInvalidUnique()
    {
        if (empty($this->originalData)) {
            $this->errors['invalidUnique'] = 'Invalid unique or id provided';
            return true;
        }
        return false;
    }

    protected function uniqueCheck()
    {
        $uniqueCheck = $this->isInvalidUnique();
        if (!empty($uniqueCheck)) {
            $this->setResult(false);
            $this->sendResult();
            return false;
        }
        return true;
    }
}

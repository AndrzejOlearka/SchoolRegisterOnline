<?php

namespace App\Lib;

use Core\AbstractAction;
use Core\Request\JsonEncoder;
use App\Provider\UsersProvider;

class Authentication extends AbstractAction
{
    public $result = false;
    private $errors = [];
    private $provider;

    public function __construct(UsersProvider $provider)
    {
        $this->provider = $provider;
    }
    /**
     * run all santizing and validating functions
     *
     * @return void
     */
    public function validate()
    {
        $this->isFormEmpty();
        $this->isUserExists();
        $this->setResult();
        $this->setCredentials();
        $this->sendResult();
    }

    /**
     * check if login form is empty
     *
     * @return void
     */
    private function isFormEmpty()
    {
        if (empty($this->provider->formData['email'])) {
            $this->errors['emptyEmail'] = 'Email is empty.';
        }
        if (empty($this->provider->formData['password'])) {
            $this->errors['emptyPassword'] = 'Password is empty.';
        }
    }

    /**
     * check if user with this id exists;
     *
     * @return void
     */
    private function isUserExists()
    {
        if (empty($this->provider->originalData->id)) {
            $this->errors['wrongEmail'] = 'There is no user with this email.';
        }
    }

    private function isPasswordVerified(){
        if(!password_verify($this->provider->formData['password'], $this->$this->provider->originalData->id)){
            $this->errors['wrongPassword'] = 'Wrong password.';
        }
    }

    private function setResult()
    {
        if (empty($this->errors)) {
            $this->result = true;
        }
    }
    
    private function sendResult(){
        JsonEncoder::parse([
            'result' => $this->result,
            'data' => $this->errors
        ]);
    }

    private function setCredentials(){
        $this->initSession();
        $this->setSession('userID', $this->provider->originalData->id);
    }
}

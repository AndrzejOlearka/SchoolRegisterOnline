<?php

namespace App\Lib\Actions\Users;

use Core\AbstractAction;
use Core\Request\Response;
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
        $this->isPasswordVerified();
        $this->setResult();
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

    /**
     * check if hash password is verified
     *
     * @return void
     */
    private function isPasswordVerified(){
        if(!password_verify($this->provider->formData['password'], $this->provider->originalData->password)){
            $this->errors['wrongPassword'] = 'Wrong password.';
        }
    }

    /**
     * set final result of action
     *
     * @return void
     */
    private function setResult()
    {
        if (empty($this->errors)) {
            $this->result = true;
        }
    }
    
    /**
     * send API response
     *
     * @return void
     */
    private function sendResult(){
        Response::json([
            'result' => $this->result,
            'errors' => $this->errors,
            'data' => [
                'role' => $this->provider->originalData->role
            ]
        ]);
    }
}

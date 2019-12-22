<?php

namespace App\Lib;

use App\Model\User;
use Core\Request\JsonEncoder;

class Authentication
{
    public $result = false;
    private $errors = [];

    public function __construct(User $model)
    {
        $this->user = $model->getUser();
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
        $this->sendResult();
    }

    /**
     * check if login form is empty
     *
     * @return void
     */
    private function isFormEmpty()
    {
        if (empty($this->user->request['email'])) {
            $this->errors['emptyEmail'] = 'Email is empty.';
            //d('chuja sie udalo');
        }
        if (empty($this->user->request['password'])) {
            $this->errors['emptyLogin'] = 'Login is empty.';
            //d('chuja sie udalo');
        }
    }

    /**
     * check if user with this id exists;
     *
     * @return void
     */
    private function isUserExists()
    {
        if (empty($this->user->id)) {
            $this->error = true;
            //d('chuja sie udalo');\
            $this->errors['wrongEmail'] = 'There is no user with this email.';
        }
    }
/*
    private function isPasswordStrengthEnough(){
        if(!preg_match('^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\W])(?=\S*[\d])\S*$', $this->user->request['password'])){
            $this->errors['passwordStrength'] = 'Password has to contain at least 8 characters, 1 upper Letter, 1 number and 1 special character.';
        }
    }
*/
    private function sendResult(){
        if(empty($this->errors)){
            $this->result = true;
        }
        JsonEncoder::parse([
            'result' = $this->result,
            'data' = $this->errors
        ]);
    }
}

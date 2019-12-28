<?php

namespace App\Lib;

use Core\Request\JsonEncoder;
use App\Provider\UsersProvider;

class Authentication
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
            //d('chuja sie udalo');
        }
        if (empty($this->provider->formData['password'])) {
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
        if (empty($this->provider->originalData->id)) {
            $this->error = true;
            //d('chuja sie udalo');\
            $this->errors['wrongEmail'] = 'There is no user with this email.';
        }
    }
    
    private function sendResult(){
        if(empty($this->errors)){
            $this->result = true;
        }
        JsonEncoder::parse([
            'result' => $this->result,
            'data' => $this->errors
        ]);
    }
}

<?php

namespace App\Lib;

use App\Provider\UsersProvider;
use Core\Helpers\Encrypter;
use Core\Request\JsonEncoder;
use Core\Request\Validator\Post as PostValidator;

class Registration 
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
        $this->isPasswordEqualToSecond();
        $this->isPasswordStrengthEnough();
        $this->setResult();
        $this->createUser();
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
        if (empty($this->provider->formData['password']) || empty($this->provider->formData['password2'])) {
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
        if (!empty($this->provider->originalData->id)) {
            $this->errors['wrongEmail'] = 'There is an user with this email.';
        }
    }

    private function isPasswordEqualToSecond()
    {
        if ($this->provider->formData['password'] != $this->provider->formData['password2']) {
            $this->errors['differentPasswords'] = 'Passwords are not similar to each other.';
        }
    }

    private function isPasswordStrengthEnough()
    {
        if (!preg_match('/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\W])(?=\S*[\d])\S*$/', $this->provider->formData['password'])) {
            $this->errors['passwordStrength'] = 'Password has to contain at least 8 characters, 1 upper Letter, 1 number and 1 special character.';
        }
    }

    private function setResult()
    {
        if (empty($this->errors)) {
            $this->result = true;
        }
    }

    private function sendResult()
    {
        JsonEncoder::parse([
            'result' => $this->result,
            'data' => $this->errors,
        ]);
    }

    private function createUser()
    {
        if ($this->result) {
            $this->provider->formData['password'] = Encrypter::hash($this->provider->formData['password']);
            $this->provider->createUser();
        }
    }
}

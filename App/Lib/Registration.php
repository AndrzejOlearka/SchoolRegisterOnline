<?php

namespace App\Lib;

use App\Model\User;
use Core\Helpers\Encrypter;
use Core\Request\JsonEncoder;
use Core\Request\Validator\Post as PostValidator;

class Registration
{
    public $result = false;
    private $errors = [];
    private $user;

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
        $this->user->request['email'] = PostValidator::input('email');
        $this->user->request['password'] = PostValidator::input('password');
        $this->user->request['password2'] = PostValidator::input('password2');

        if (empty($this->user->request['email'])) {
            $this->errors['emptyEmail'] = 'Email is empty.';
        }
        if (empty($this->user->request['password']) || empty($this->user->request['password2'])) {
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
        if (empty($this->user->id)) {
            $this->error = true;
            //d('chuja sie udalo');\
            $this->errors['wrongEmail'] = 'There is no user with this email.';
        }
    }

    private function isPasswordEqualToSecond()
    {
        if ($this->user->request['password'] != $this->user->request['password2']) {
            $this->errors['differentPaswords'] = 'Passwords are not similar to each other.';
        }
    }

    private function isPasswordStrengthEnough()
    {
        if (!preg_match('^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\W])(?=\S*[\d])\S*$', $this->user->request['password'])) {
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
            $this->user->request['password'] = Encrypter::hash($this->user->request['password']);
            $this->user->createUser();
        }
    }
}

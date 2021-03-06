<?php

namespace App\Lib\Actions\Users;

use Core\Helpers\Encrypter;
use App\Provider\UsersProvider;
use Core\Action\AbstractAction;

class Registration extends AbstractAction
{
    public function __construct(UsersProvider $provider)
    {
        $this->provider = $provider;
        $this->formData = $this->provider->getFormData();
        $this->provider->setQuery(" WHERE email = '{$this->formData['email']}'");
        $this->provider->getUsers();
        $this->originalData = $this->provider->getOriginalData()[0];
    }

    public function create(){

        $this->isUserExists()
             ->isPasswordStrengthEnough()
             ->hashPassword()
             ->setResult()
             ->addUser()
             ->sendResult();
    }

    protected function isUserExists(){
        if(!empty($this->originalData)){
            $this->errors['wrongEmail'] = 'There is an user with this email.';
        }
        return $this;
    }

    protected function isPasswordStrengthEnough(){
        if (!preg_match('/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\W])(?=\S*[\d])\S*$/', $this->formData['password'])) {
            $this->errors['passwordStrength'] = 'Password has to contain at least 8 characters, 1 upper Letter, 1 number and 1 special character.';
        }
        return $this;
    }

    protected function hashPassword(){
        $this->formData['password'] = Encrypter::hash($this->formData['password']);
        return $this;
    }

    protected function addUser(){
        if($this->result){
            $this->provider->setFormData($this->getFormData());  
            $this->provider->addUser();
            $this->originalData = $this->provider->getOriginalData();
        }
        return $this;
    }
}

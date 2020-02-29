<?php

namespace App\Lib\Actions\Users;

use App\Provider\UsersProvider;
use Core\Action\EditAction;

class UserEditor extends Authentication implements EditAction
{
    public function __construct(UsersProvider $provider)
    {
        parent::__construct(...func_get_args());
    }

    public function edit(){
        $this->isUserExists()
             ->isPasswordDifferent()
             ->hashPassword()
             ->setResult()
             ->editUser()
             ->sendResult();
    }

    private function isPasswordDifferent(){
        if(password_verify($this->formData['password'], $this->originalData->password)){
            $this->errors['samePassword'] = 'New password has to be different than old one.';
        }
        return $this;
    }
    
    protected function editUser(){
        if($this->result){
            $this->provider->setFormData($this->getFormData());  
            $this->provider->editUser();
            $this->originalData = $this->provider->getOriginalData();
        }
        return $this;
    }
}

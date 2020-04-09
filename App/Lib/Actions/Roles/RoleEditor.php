<?php

namespace App\Lib\Actions\Roles;

use App\Provider\RolesProvider;
use Core\Action\EditAction;

class RoleEditor extends RoleCreator implements EditAction
{
    public function __construct(RolesProvider $provider)
    {
        $this->provider = $provider;
        $this->formData = $this->provider->getFormData();
        $this->provider->setQuery(" WHERE id = {$this->formData['id']}");
        $this->provider->getRoles();
        $this->originalData = $this->provider->getOriginalData();
    }

    public function edit()
    {
        if (!$this->uniqueCheck()) {
            return $this;
        }

        $this->isExistsRole()
             ->isRoleAlphaNumAndSomeChars()
             ->sanitazeDescription()
             ->setResult()
             ->editRole();

        return $this->sendResult();
    }
    
    public function editRole(){
        if($this->result){
            $this->provider->editRole();
            $this->originalData = $this->provider->getOriginalData();
        }
        return $this;
    }
}

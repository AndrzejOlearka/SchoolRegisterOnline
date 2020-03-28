<?php

namespace App\Lib\Actions\ParentContacts;

use App\Provider\ParentContactsProvider;
use Core\Action\EditAction;

class ParentContactEditor extends ParentContactCreator implements EditAction
{
    public function __construct(ParentContactsProvider $provider)
    {
        $this->provider = $provider;
        $this->formData = $this->provider->getFormData();
        $this->provider->setQuery(" WHERE id = {$this->formData['id']}");
        $this->provider->getParentContacts();
        $this->originalData = $this->provider->getOriginalData();
    }

    public function edit(){
        $this->isExistsParentContact()
             ->isNameAlpha()
             ->setResult()
             ->editParentContact()
             ->sendResult();
    }
    
    public function editParentContact(){
        if($this->result){
            $this->provider->editParentContact();
            $this->originalData = $this->provider->getOriginalData();
        }
        return $this;
    }
}

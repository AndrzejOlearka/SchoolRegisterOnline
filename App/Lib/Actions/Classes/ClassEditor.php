<?php

namespace App\Lib\Actions\Classes;

use App\Provider\ClassesProvider;
use Core\Action\EditAction;

class ClassEditor extends ClassCreator implements EditAction
{
    const MSG_EDIT_CLASS = 'Class has been edited successfully.';

    public function __construct(ClassesProvider $provider)
    {
        $this->provider = $provider;
        $this->formData = $this->provider->getFormData();
        $this->provider->setQuery(" WHERE id = {$this->formData['id']}");
        $this->provider->getClasses();
        $this->originalData = $this->provider->getOriginalData();
    }

    public function edit(){
        $this->isExistsClass()
             ->isNumberInteger()
             ->isDepartmentAlpha()
             ->setResult()
             ->editClass()
             ->sendResult(ClassEditor::MSG_EDIT_CLASS);
    }
    
    public function editClass(){
        if($this->result){
            $this->provider->editClass();
            $this->originalData = $this->provider->getOriginalData();
        }
        return $this;
    }
}

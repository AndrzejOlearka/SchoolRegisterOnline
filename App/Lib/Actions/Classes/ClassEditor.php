<?php

namespace App\Lib\Actions\Classes;

use App\Provider\ClassesProvider;
use Core\Action\EditAction;

class ClassEditor extends ClassCreator implements EditAction
{
    public function __construct(ClassesProvider $provider)
    {
        $this->formData = $provider->getFormData();
        $this->originalData = $provider->getOriginalData();
    }

    public function edit(){
        $this->issetClass()
             ->isNumberInteger()
             ->isDepartmentAlpha()
             ->setResult();
    }
}

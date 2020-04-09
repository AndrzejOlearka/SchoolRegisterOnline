<?php

namespace App\Lib\Actions\Classes;

use App\Provider\ClassesProvider;
use Core\Action\EditAction;

class ClassEditor extends ClassCreator implements EditAction
{
    public function __construct(ClassesProvider $provider)
    {
        $this->provider = $provider;
        $this->formData = $this->provider->getFormData();
        $this->provider->setQuery(" WHERE id = {$this->formData['id']}");
        $this->provider->getClasses();
        $this->originalData = $this->provider->getOriginalData();
    }

    public function edit()
    {
        if (!$this->uniqueCheck()) {
            return $this;
        }

        $this->isExistsClass()
            ->isNumberInteger()
            ->isDepartmentAlpha()
            ->setResult()
            ->editClass();

        return $this->sendResult();
    }

    public function editClass()
    {
        if ($this->result) {
            $this->provider->editClass();
            $this->originalData = $this->provider->getOriginalData();
        }
        return $this;
    }
}

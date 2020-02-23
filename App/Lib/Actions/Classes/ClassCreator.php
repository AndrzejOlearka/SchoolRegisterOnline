<?php

namespace App\Lib\Actions\Classes;

use App\Lib\Validators\ContentValidator;
use App\Lib\Validators\NumberValidator;
use App\Lib\Validators\StringValidator;
use App\Provider\ClassesProvider;
use Core\Action\AbstractAction;
use Core\Action\CreatorAction;

class ClassCreator extends AbstractAction implements CreatorAction
{
    use StringValidator;
    use NumberValidator;
    use ContentValidator;

    const MSG_CREATE_CLASS = 'Class has been created successfully.';

    /**
     * __construct
     *
     * preparing form data and original data to proceed class creating
     *
     * @param object of ClassesProvider $provider
     *
     * @return void
     */
    public function __construct(ClassesProvider $provider)
    {
        $this->provider = $provider;
        $this->formData = $this->provider->getFormData();
        $this->provider->setQuery(" WHERE number = {$this->formData['number']} AND department = '{$this->formData['department']}' ");
        $this->provider->getClasses();
        $this->originalData = $this->provider->getOriginalData();
    }

    /**
     * process of classes creating
     * includes validation, sanitization, setting result and sending result
     *
     * @return void
     */
    public function create()
    {
        $this->isExistsClass()
            ->isNumberInteger()
            ->isDepartmentAlpha()
            ->setResult()
            ->addClass()
            ->sendResult(ClassCreator::MSG_CREATE_CLASS);
    }

    protected function isExistsClass()
    {
        if (empty($this->originalData)) {
            return $this;
        }
        if (
            $this->compareRow($this->originalData[0]->number, $this->formData['number']) &&
            $this->compareRow($this->originalData[0]->department, $this->formData['department'])
        ) {
            $this->errors['classExists'] = 'There is class with this number and department';
        }
        return $this;
    }

    protected function isNumberInteger()
    {
        $result = $this->isInteger($this->formData['number']);
        if (!$result) {
            $this->errors['classNumber'] = 'class number is not an integer';
        }
        return $this;
    }

    protected function isDepartmentAlpha()
    {
        $result = $this->isAlpha($this->formData['department']);
        if (!$result) {
            $this->errors['classDepartment'] = 'class number is not an alpha type';
        }
        return $this;
    }

    protected function addClass()
    {
        if ($this->result) {
            $this->provider->addClass();
            $this->originalData = $this->provider->getOriginalData();
        }
        return $this;
    }
}

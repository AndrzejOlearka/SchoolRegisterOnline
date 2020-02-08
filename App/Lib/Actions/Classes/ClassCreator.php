<?php

namespace App\Lib\Actions\Classes;

use Core\Action\CreatorAction;
use Core\Action\AbstractAction;
use App\Provider\ClassesProvider;
use App\Lib\Validators\NumberValidator;
use App\Lib\Validators\StringValidator;
use App\Lib\Validators\ContentValidator;

class ClassCreator extends AbstractAction implements CreatorAction
{
    use StringValidator;
    use NumberValidator;
    use ContentValidator;

    const MSG_CREATE_CLASS = 'Class has been created successfully.';

    public function __construct(ClassesProvider $provider)
    {
        $this->provider = $provider;
        $this->formData = $this->provider->getFormData();
        $this->provider->setQuery(" WHERE number = {$this->formData['number']} AND department = '{$this->formData['department']}' ");
        $this->provider->getClasses();
        $this->originalData = $this->provider->getOriginalData();
    }

    public function create(){

        $this->isExistsClass()
             ->isNumberInteger()
             ->isDepartmentAlpha()
             ->setResult()
             ->addClass()
             ->sendResult(ClassCreator::MSG_CREATE_CLASS);
    }

    protected function isExistsClass(){
        if(empty($this->originalData)){
            return $this;
        }
        if(
            $this->compareRow($this->originalData[0]->number, $this->formData['number']) &&
            $this->compareRow($this->originalData[0]->department, $this->formData['department'])
        ){
            $this->errors['classExists'] = 'There is class with this number and department';
        }
        return $this;
    }

    protected function isNumberInteger(){
        $result = $this->isInteger($this->formData['number']);
        if(!$result){
            $this->errors['classNumber'] = 'class number is not an integer';
        }
        return $this;
    }

    protected function isDepartmentAlpha(){
        $result = $this->isAlpha($this->formData['department']);
        if(!$result){
            $this->errors['classDepartment'] = 'class number is not an alpha type';
        }
        return $this;
    }

    protected function addClass(){
        if($this->result){
            $this->provider->addClass();
            $this->originalData = $this->provider->getOriginalData();
        }
        return $this;
    }
}

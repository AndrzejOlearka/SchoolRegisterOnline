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

    public function __construct(ClassesProvider $provider)
    {
        $this->formData = $provider->getFormData();
        $this->originalData = $provider->getOriginalData();
    }

    public function create(){
        $this->issetClass()
             ->isNumberInteger()
             ->isDepartmentAlpha()
             ->setResult();
    }

    protected function issetClass(){
        $result = $this->issetRow($this->originalData[0]->id);
        if($result){
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
        if($result){
            $this->errors['classDepartment'] = 'class number is not an alpha type';
        }
        return $this;
    }
}

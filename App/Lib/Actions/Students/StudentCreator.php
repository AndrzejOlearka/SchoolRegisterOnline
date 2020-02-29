<?php

namespace App\Lib\Actions\Students;

use Core\Action\CreatorAction;
use Core\Action\AbstractAction;
use App\Lib\Validators\NumberValidator;
use App\Lib\Validators\StringValidator;
use App\Lib\Validators\ContentValidator;
use App\Provider\StudentsProvider;

class StudentCreator extends AbstractAction implements CreatorAction
{
    public function __construct(StudentsProvider $provider)
    {
        $this->provider = $provider;
        $this->formData = $this->provider->getFormData();
        $this->checkForIdenticalStudent();
    }

    public function create(){

        $this->isExistsStudentInThisClass()
             ->isSexPredefiniedValues()
             ->isClassInteger()
             ->isFullnameAlpha()
             ->isParentsAlpha()
             ->sanitazeBirthday()
             ->setResult()
             ->addStudent()
             ->sendResult();
    }

    protected function isExistsStudentInThisClass(){
        if(!empty($this->originalData)){
            $this->errors['studentExists'] = 'In this class there is student with the same data';
        }
        return $this;
    }

    protected function isSexPredefiniedValues(){
        if(!isset($this->formData['sex'])){
            return;
        }
        if(!$this->isPredefinedValue($this->formData['sex'], 2)){
            $this->errors['sexValue'] = 'Sex value can be only 1 for men and 2 for women';
        }
        return $this;
    }

    protected function isClassInteger(){
        $result = $this->isInteger($this->formData['class_id']);
        if(!$result){
            $this->errors['classId'] = 'class id is not an integer';
        }
        return $this;
    }

    protected function isFullnameAlpha(){
        $result = $this->isAlpha($this->formData['firstname']);
        if(!$result){
            $this->errors['studentFirstname'] = 'Student firstname can contains only letters';
        }
        $result = $this->isAlpha($this->formData['lastname']);
        if(!$result){
            $this->errors['studentLastname'] = 'Student lastname can contains only letters';
        }
        return $this;
    }

    protected function isParentsAlpha(){
        if(!isset($this->formData['father'])){
            return;
        }
        $result = $this->isAlpha($this->formData['father']);
        if(!$result){
            $this->errors['studentFather'] = 'Student father fullname can contains only letters';
        }
        if(!isset($this->formData['mother'])){
            return;
        }
        $result = $this->isAlpha($this->formData['mother']);
        if(!$result){
            $this->errors['studentMother'] = 'Student mother fullname can contains only letters';
        }
        return $this;
    }

    protected function sanitazeBirthday(){
        if(!isset($this->formData['birthday'])){
            return;
        }
        $result = $this->changeToSqlDate($this->formData['birthday']);
        if(!$result){
            $this->errors['studentMother'] = 'Student mother fullname can contains only letters';
        }
        return $this;
    }

    protected function addStudent(){
        if($this->result){
            $this->provider->addStudent();
            $this->originalData = $this->provider->getOriginalData();
        }
        return $this;
    }

    protected function checkForIdenticalStudent(){
        $array = ['firstname', 'lastname', 'sex', 'class_id', 'birthday', 'father', 'mother'];
        foreach($array as $element){
            if(!isset($this->formData[$element]) || is_null($this->formData[$element])){
                return $this;
            }
        }
        $this->provider->setQuery(" 
            WHERE firstname = '{$this->formData['firstname']}' 
            AND lastname = '{$this->formData['lastname']}' 
            AND sex = '{$this->formData['sex']}' 
            AND class_id = '{$this->formData['class_id']}'
            AND birthday = '{$this->formData['birthday']}'
            AND father = '{$this->formData['father']}'
            AND mother = '{$this->formData['mother']}' 
        ");
        $this->provider->getStudents();
        $this->originalData = $this->provider->getOriginalData();
    }
}

<?php

namespace App\Lib\Actions\Students;

use App\Lib\Filters\TeachersFilter;
use Core\Action\CreatorAction;
use Core\Action\AbstractAction;
use App\Lib\Validators\NumberValidator;
use App\Lib\Validators\StringValidator;
use App\Lib\Validators\ContentValidator;
use App\Provider\TeachersProvider;

class TeacherCreator extends AbstractAction implements CreatorAction
{
    use StringValidator;
    use NumberValidator;
    use ContentValidator;

    const MSG_CREATE_TEACHER = 'Teacher has been created successfully.';

    public function __construct(TeachersProvider $provider)
    {
        $this->provider = $provider;
        $this->formData = $this->provider->getFormData();
        $this->provider->setQuery(" WHERE user_id = {$this->formData['user_id']} ");
        $this->provider->getTeachers();
        $this->originalData = $this->provider->getOriginalData()[0];
    }

    public function create(){

        $this->isTeacherAssignedToThisUser()
             ->isSexPredefiniedValues()
             ->isUserInteger()
             ->isFullnameAlpha()
             ->sanitazeSchoolSubjects()
             ->setResult()
             ->addTeacher()
             ->sendResult(TeacherCreator::MSG_CREATE_TEACHER);
    }

    protected function isTeacherAssignedToThisUser(){
        if(!empty($this->originalData)){
            $this->errors['teacherExists'] = 'Teacher is assigned to this user id';
        }
        return $this;
    }

    protected function isSexPredefiniedValues(){
        if(!isset($this->formData['sex'])){
            return $this;
        }
        if(!$this->isPredefinedValue($this->formData['sex'], 2)){
            $this->errors['sexValue'] = 'Sex value can be only 1 for men and 2 for women';
        }
        return $this;
    }

    protected function isUserInteger(){
        $result = $this->isInteger($this->formData['user_id']);
        if(!$result){
            $this->errors['userId'] = 'User id is not an integer';
        }
        return $this;
    }

    protected function isFullnameAlpha(){
        $result = $this->isAlpha($this->formData['firstname']);
        if(!$result){
            $this->errors['studentFirstname'] = 'Teacher firstname can contains only letters';
        }
        $result = $this->isAlpha($this->formData['lastname']);
        if(!$result){
            $this->errors['studentLastname'] = 'Teacher lastname can contains only letters';
        }
        return $this;
    }

    protected function sanitazeSchoolSubjects(){
        if(!isset($this->formData['school_subjects'])){
            return $this;
        }
        if(!$this->isOnlyNumbersAndCommas($this->formData['school_subjects'])){
            $this->errors['subjectsString'] = 'School subjects has to be comma separated and contains only integers';
        }
        return $this;
        //$filter = new TeachersFilter($this->provider);
        //$this->formData['school_subjects'] = $filter->sanitazeSubjects();
    }

    protected function addTeacher(){
        if($this->result){
            $this->provider->addTeacher();
            $this->originalData = $this->provider->getOriginalData();
        }
        return $this;
    }
}

<?php

namespace App\Lib\Actions\ParentContacts;

use Core\Action\CreatorAction;
use Core\Action\AbstractAction;
use App\Provider\StudentsProvider;
use App\Provider\TeachersProvider;
use App\Provider\GradeTypesProvider;
use App\Provider\ParentContactsProvider;
use App\Provider\SchoolSubjectsProvider;
use App\Provider\UsersProvider;

class ParentContactCreator extends AbstractAction implements CreatorAction
{
    protected $lessonGradeType;
    /**
     * __construct
     *
     * preparing form data and original data to proceed ParentContact creating
     *
     * @param object of ParentContactsProvider $provider
     *
     * @return void
     */
    public function __construct(ParentContactsProvider $provider)
    {
        $this->provider = $provider;
        $this->formData = $this->provider->getFormData();
        $this->provider->setQuery(" WHERE parent = '{$this->formData['parent']}' AND student_id = {$this->formData['student_id']}");
        $this->provider->getParentContacts();
        $this->originalData = $this->provider->getOriginalData();
    }

    /**
     * process of ParentContacts creating
     * includes validation, sanitization, setting result and sending result
     *
     * @return void
     */
    public function create()
    {
        $this->existsParent()
            ->issetStudent()
            ->issetUser()
            ->isParentAlpa()
            ->isDescriptionValid()
            ->isParentPredefinedValue()
            ->checkEmail()
            ->setResult()
            ->addParentContact();

        return $this->sendResult();
    }

    protected function existsParent(){
        if(!empty($this->originalData)){
            $this->errors['parentExists'] = 'Parent is exists for student with this id';
        }
        return $this;
    }

    protected function issetStudent()
    {
        $provider = new StudentsProvider;
        $provider->setQuery(" WHERE id = {$this->formData['student_id']}");
        $provider->getStudents();
        if (empty($provider->getOriginalData()[0]->id)) {
            $this->errors['noStudent'] = 'There is no student with this ID';
        }
        return $this;
    }

    protected function issetUser()
    {
        if(!isset($this->formData['user_id'])){
            return $this;
        }
        $provider = new UsersProvider;
        $provider->setQuery(" WHERE id = {$this->formData['user_id']}");
        $provider->getUsers();
        if (empty($provider->getOriginalData()[0]->id)) {
            $this->errors['noUser'] = 'There is no student with this ID';
        }
        return $this;
    }

    protected function isParentAlpa()
    {
        if(!$this->isAlpha($this->formData['parent'])){
            $this->errors['invalidParentString'] = 'Parent names has to contains only';
        }
        return $this;
    }

    protected function isParentPredefinedValue(){
        if(!$this->isPredefinedEnum($this->formData['parent'], ['mother', 'father', 'guardian', 'other'])){
            $this->errors['invalidParent'] = 'Valid options for parent are: mother, father, guardian and other';
        }
        return $this;
    }

    protected function isDescriptionValid()
    {
        if(!isset($this->formData['user_id'])){
            return $this;
        }
        if(!$this->isAlphaNumericAndBasicChars($this->formData['description'])){
            $this->errors['invalidParent'] = 'Description contains invalid chars, can contains only numbers, letters and some special chars (\'-\', \'_\', \'+\')';
        }
        return $this;
    }

    protected function checkEmail(){
        if(!isset($this->formData['email'])){
            return $this;
        }
        if(!$this->validateAndSantizeEmail($this->formData['email'])){
            $this->errors['invalidEmail'] = 'Invalid parent contact email';
        }
        return $this;
    }

    protected function addParentContact()
    {
        if ($this->result) {
            $this->provider->addParentContact();
            $this->originalData = $this->provider->getOriginalData();
        }
        return $this;
    }
}

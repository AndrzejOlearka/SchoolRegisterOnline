<?php

namespace App\Lib\Actions\Groups;

use Core\Action\CreatorAction;
use Core\Action\AbstractAction;
use App\Provider\GroupsProvider;
use App\Provider\ClassesProvider;
use App\Provider\TeachersProvider;
use App\Lib\Validators\NumberValidator;
use App\Lib\Validators\StringValidator;
use App\Lib\Validators\ContentValidator;
use App\Provider\SchoolSubjectsProvider;

class GroupCreator extends AbstractAction implements CreatorAction
{
    use StringValidator;
    use NumberValidator;
    use ContentValidator;

    const MSG_CREATE_CLASS = 'Group has been created successfully.';

    /**
     * __construct
     *
     * preparing form data and original data to proceed class creating
     *
     * @param object of GroupsProvider $provider
     *
     * @return void
     */
    public function __construct(GroupsProvider $provider)
    {
        $this->provider = $provider;
        $this->formData = $this->provider->getFormData();
        $this->provider->setQuery(" 
            WHERE class_id = {$this->formData['class_id']} 
            AND name = '{$this->formData['name']}' "
        );
        $this->provider->getGroups();
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
        $this->isExistsGroup()
            ->isNameAlphaNumeric()
            ->issetClass()
            ->issetTeacher()
            ->issetSchoolSubject()
            ->isStudentsValidJson()
            ->setResult()
            ->addGroup();

        $this->sendResult();
    }

    protected function isExistsGroup()
    {
        if (!empty($this->originalData)) {
            $this->errors['groupExists'] = 'There is group with this name in this class';
        } 
        return $this;
    }

    protected function isNameAlphaNumeric()
    {
        $result = $this->isAlphaNumeric($this->formData['name']);
        if (!$result) {
            $this->errors['className'] = 'class name is not an alphanumeric type';
        }
        return $this;
    }

    protected function issetClass()
    {
        $provider = new ClassesProvider;
        $provider->setQuery(" WHERE id = {$this->formData['class_id']}");
        $provider->getClasses();
        if (empty($provider->getOriginalData()[0]->id)) {
            $this->errors['noStudent'] = 'There is no class with this ID';
        }
        return $this;
    }

    protected function issetTeacher()
    {
        if (empty($this->formData['teacher_id'])) {
            return $this;
        } 
        $provider = new TeachersProvider;
        $provider->setQuery(" WHERE id = {$this->formData['teacher_id']}");
        $provider->getTeachers();
        if (empty($provider->getOriginalData()[0]->id)) {
            $this->errors['noTeacher'] = 'There is no teacher with this ID';
        }
        return $this;
    }

    protected function issetSchoolSubject()
    {
        if (empty($this->formData['school_subject_id'])) {
            return $this;
        } 
        $provider = new SchoolSubjectsProvider;
        $provider->setQuery(" WHERE id = {$this->formData['school_subject_id']}");
        $provider->getSchoolSubjects();
        if (empty($provider->getOriginalData()[0]->id)) {
            $this->errors['noSubject'] = 'There is no school subject with this ID';
        }
        return $this;
    }

    protected function isStudentsValidJson(){
        if (empty($this->formData['students'])) {
            return $this;
        } 
        if(!$this->isValidJson($this->formData['students'])){
            $this->errors['invalidJsonStudents'] = 'Students list is not in string that is valid json';
        }
        return $this;
    }

    protected function addGroup()
    {
        if ($this->result) {
            $this->provider->addGroup();
            $this->originalData = $this->provider->getOriginalData();
        }
        return $this;
    }
}

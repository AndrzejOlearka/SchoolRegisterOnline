<?php

namespace App\Lib\Actions\LessonDatas;

use Core\Action\CreatorAction;
use Core\Action\AbstractAction;
use App\Provider\LessonDataProvider;
use App\Provider\ClassesProvider;

class LessonDataCreator extends AbstractAction implements CreatorAction
{
    /**
     * __construct
     *
     * preparing form data and original data to proceed class creating
     *
     * @param object of LessonDatasProvider $provider
     *
     * @return void
     */
    public function __construct(LessonDataProvider $provider)
    {
        $this->provider = $provider;
        $this->formData = $this->provider->getFormData();
    }

    /**
     * process of classes creating
     * includes validation, sanitization, setting result and sending result
     *
     * @return void
     */
    public function create()
    {
        $this->issetClass()
            ->issetSchoolDay()
            ->isSubjectValidString()
            ->isDescriptionValidString()
            ->isLessonDataValidJson()
            ->setResult()
            ->addLessonData();

        return $this->sendResult();
    }

    protected function issetClass()
    {
        $provider = new ClassesProvider;
        $provider->setQuery(" WHERE id = {$this->formData['class_id']}");
        $provider->getClasses();
        if (empty($provider->getOriginalData()[0]->id)) {
            $this->errors['noClass'] = 'There is no class with this ID';
        }
        return $this;
    }

    protected function issetSchoolDay()
    {
        $provider = new SchoolDaysProvider;
        $provider->setQuery(" WHERE id = {$this->formData['school_day_id']}");
        $provider->getSchoolDays();
        if (empty($provider->getOriginalData()[0]->id)) {
            $this->errors['noTeacher'] = 'There is no school day with this ID';
        }
        return $this;
    }

    protected function isSubjectValidString(){
        if (empty($this->formData['subject'])) {
            return $this;
        } 
        if(!$this->sanitazeString($this->formData['subject'])){
            $this->errors['subjectInvalid'] = 'Subject contains invalid content';
        }
        return $this;
    }

    protected function isDescriptionValidString(){
        if (empty($this->formData['description'])) {
            return $this;
        } 
        if(!$this->sanitazeString($this->formData['description'])){
            $this->errors['descriptionInvalid'] = 'Description contains invalid content';
        }
        return $this;
    }

    protected function isLessonDataValidJson(){
        if (empty($this->formData['students'])) {
            return $this;
        } 
        if(!$this->isValidJson($this->formData['students'])){
            $this->errors['invalidJsonStudents'] = 'Students list is not a string that is valid json';
        }
        return $this;
    }

    protected function addLessonData()
    {
        if ($this->result) {
            $this->provider->addLessonData();
            $this->originalData = $this->provider->getOriginalData();
        }
        return $this;
    }
}

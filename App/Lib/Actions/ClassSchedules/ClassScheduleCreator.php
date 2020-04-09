<?php

namespace App\Lib\Actions\ClassSchedules;

use Core\Action\CreatorAction;
use Core\Action\AbstractAction;
use App\Provider\ClassesProvider;
use App\Provider\ClassSchedulesProvider;

class ClassScheduleCreator extends AbstractAction implements CreatorAction
{
    /**
     * __construct
     *
     * preparing form data and original data to proceed class creating
     *
     * @param object of ClassSchedulesProvider $provider
     *
     * @return void
     */
    public function __construct(ClassSchedulesProvider $provider)
    {
        $this->provider = $provider;
        $this->formData = $this->provider->getFormData();
        $this->provider->setQuery(" WHERE class_id = {$this->formData['class_id']} AND week = {$this->formData['week']}");
        $this->provider->getClassSchedules();
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
        $this->isExistsClassSchedule()
            ->issetClass()
            ->isScheduleValidJson()
            ->isDescriptionValidString()
            ->setResult()
            ->addClassSchedule();

        return $this->sendResult();
    }

    protected function isExistsClassSchedule()
    {
        if (!empty($this->originalData)) {
            $this->errors['classScheduleExists'] = 'There is Class Schedule with for this class at this week';
        } 
        return $this;
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

    protected function isScheduleValidJson(){
        if (empty($this->formData['schedule'])) {
            return $this;
        } 
        if(!$this->isValidJson($this->formData['schedule'])){
            $this->errors['invalidJsonSchedule'] = 'Schedule is not a string that is valid json';
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

    protected function addClassSchedule()
    {
        if ($this->result) {
            $this->provider->addClassSchedule();
            $this->originalData = $this->provider->getOriginalData();
        }
        return $this;
    }
}

<?php

namespace App\Lib\Actions\DefaultSchedules;

use Core\Action\CreatorAction;
use Core\Action\AbstractAction;
use App\Provider\ClassesProvider;
use App\Provider\DefaultSchedulesProvider;

class DefaultScheduleCreator extends AbstractAction implements CreatorAction
{
    /**
     * __construct
     *
     * preparing form data and original data to proceed class creating
     *
     * @param object of DefaultSchedulesProvider $provider
     *
     * @return void
     */
    public function __construct(DefaultSchedulesProvider $provider)
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
            ->isScheduleValidJson()
            ->isDescriptionValidString()
            ->setResult()
            ->addDefaultSchedule();

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


    protected function isScheduleValidJson(){
        if (empty($this->formData['teachers'])) {
            return $this;
        } 
        if(!$this->isValidJson($this->formData['teachers'])){
            $this->errors['invalidJsonTeachers'] = 'Teachers list is not a string that is valid json';
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

    protected function addDefaultSchedule()
    {
        if ($this->result) {
            $this->provider->addDefaultSchedule();
            $this->originalData = $this->provider->getOriginalData();
        }
        return $this;
    }
}

<?php

namespace App\Lib\Actions\ClassSchedules;

use App\Lib\Actions\ClassSchedules\ClassScheduleCreator;
use App\Provider\ClassSchedulesProvider;
use Core\Action\EditAction;

class ClassScheduleEditor extends ClassScheduleCreator implements EditAction
{
    public function __construct(ClassSchedulesProvider $provider)
    {
        $this->provider = $provider;
        $this->formData = $this->provider->getFormData();
        $this->setUnique();
        $this->provider->setQuery(" WHERE id = {$this->formData[$this->unique]}");
        $this->provider->getClassSchedules();
        $this->originalData = $this->provider->getOriginalData();
    }

    public function edit()
    {
        if (!$this->uniqueCheck()) {
            return $this;
        }

        $this->issetClass()
            ->isScheduleValidJson()
            ->isDescriptionValidString()
            ->setResult()
            ->addClassSchedule();

        return $this->sendResult();
    }

    public function editClassSchedule()
    {
        if ($this->result) {
            $this->provider->editClassSchedule();
            $this->originalData = $this->provider->getOriginalData();
        }
        return $this;
    }
}

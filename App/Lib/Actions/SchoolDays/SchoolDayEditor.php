<?php

namespace App\Lib\Actions\SchoolDays;

use App\Provider\SchoolDaysProvider;
use Core\Action\EditAction;

class SchoolDayEditor extends SchoolDayCreator implements EditAction
{
    public function __construct(SchoolDaysProvider $provider)
    {
        $this->provider = $provider;
        $this->formData = $this->provider->getFormData();
        $this->setUnique();
        $this->provider->setQuery(" WHERE day = {$this->formData['day']}");
        $this->provider->getSchoolDays();
        $this->originalData = $this->provider->getOriginalData();
    }

    public function edit()
    {
        $uniqueCheck = $this->isInvalidUnique();
        if($uniqueCheck){
            $this->setResult(false);
            $this->sendResult();
            return $this;
        }
        $this->isDayExists()
            ->isDayValid()
            ->isWeekdayOnlyAlpha()
            ->sanitazeDate()
            ->setResult()
            ->sanitazeDate()
            ->editSchoolDay();

        return $this->sendResult();
    }

    public function isDayExists(){
        if(empty($this->originalData)){
            $this->errors['dayIsNotExists'] = 'Day Number with '.$this->formData['day'].' is not exists';
        }
        return $this;
    }
    
    public function editSchoolDay()
    {
        if($this->result){
            $this->provider->editSchoolDay();
            $this->originalData = $this->provider->getOriginalData();
        }
        return $this;
    }
}

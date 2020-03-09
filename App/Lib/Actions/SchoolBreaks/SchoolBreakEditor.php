<?php

namespace App\Lib\Actions\SchoolBreaks;

use App\Provider\SchoolBreaksProvider;
use Core\Action\EditAction;

class SchoolBreakEditor extends SchoolBreakCreator implements EditAction
{
    public function __construct(SchoolBreaksProvider $provider)
    {
        $this->provider = $provider;
        $this->formData = $this->provider->getFormData();
        $this->provider->setQuery(" WHERE number = {$this->formData['number']}");
        $this->provider->getSchoolBreaks();
        $this->originalData = $this->provider->getOriginalData();
    }

    public function edit(){
        $this->isNumberExists()
            ->isNumberValid()
            ->changeDateFormat()
            ->setResult()
            ->editSchoolBreak();

        return $this->sendResult();
    }

    public function isNumberExists(){
        if(empty($this->originalData)){
            $this->errors['numberIsNotExists'] = 'Break Number with '.$this->formData['number'].' is not exists';
        }
        return $this;
    }
    
    public function editSchoolBreak(){
        if($this->result){
            $this->provider->editSchoolBreak();
            $this->originalData = $this->provider->getOriginalData();
        }
        return $this;
    }
}

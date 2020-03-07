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
        $this->provider->setQuery(" WHERE id = {$this->formData['id']}");
        $this->provider->getSchoolBreaks();
        $this->originalData = $this->provider->getOriginalData();
    }

    public function edit(){
        $this->isExistsSchoolBreak()
            ->isTypePredefiniedValues()
            ->isMarkDescriptionAlphaNumeric()
            ->isWeightInteger()
            ->setResult()
             ->editSchoolBreak()
             ->sendResult();
    }
    
    public function editSchoolBreak(){
        if($this->result){
            $this->provider->editSchoolBreak();
            $this->originalData = $this->provider->getOriginalData();
        }
        return $this;
    }
}

<?php

namespace App\Lib\Actions\LessonDatas;

use App\Provider\LessonDataProvider;
use Core\Action\EditAction;

class LessonDataEditor extends LessonDataCreator implements EditAction
{
    public function __construct(LessonDataProvider $provider)
    {
        $this->provider = $provider;
        $this->formData = $this->provider->getFormData();
        $this->setUnique();
        $this->provider->setQuery(" WHERE id = {$this->formData[$this->unique]}");
        $this->provider->getLessonDatas();
        $this->originalData = $this->provider->getOriginalData();
    }

    public function edit()
    {
        $uniqueCheck = $this->isInvalidUnique();
        if(!empty($uniqueCheck)){
            $this->setResult(false);
            $this->sendResult();
            return $this;
        }
        $this->issetClass()
            ->issetSchoolDay()
            ->isSubjectValidString()
            ->isDescriptionValidString()
            ->isLessonDataValidJson()
            ->setResult()
            ->addLessonData();

        $this->sendResult();
    }
    
    public function editLessonData()
    {
        if($this->result){
            $this->provider->editLessonData();
            $this->originalData = $this->provider->getOriginalData();
        }
        return $this;
    }
}

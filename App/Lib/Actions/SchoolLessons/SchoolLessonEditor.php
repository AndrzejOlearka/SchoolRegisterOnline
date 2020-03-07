<?php

namespace App\Lib\Actions\SchoolLessons;

use App\Provider\SchoolLessonsProvider;
use Core\Action\EditAction;

class SchoolLessonEditor extends SchoolLessonCreator implements EditAction
{
    public function __construct(SchoolLessonsProvider $provider)
    {
        $this->provider = $provider;
        $this->formData = $this->provider->getFormData();
        $this->provider->setQuery(" WHERE id = {$this->formData['id']}");
        $this->provider->getSchoolLessons();
        $this->originalData = $this->provider->getOriginalData();
    }

    public function edit(){
        $this->isExistsSchoolLesson()
            ->isTypePredefiniedValues()
            ->isMarkDescriptionAlphaNumeric()
            ->isWeightInteger()
            ->setResult()
             ->editSchoolLesson()
             ->sendResult();
    }
    
    public function editSchoolLesson(){
        if($this->result){
            $this->provider->editSchoolLesson();
            $this->originalData = $this->provider->getOriginalData();
        }
        return $this;
    }
}

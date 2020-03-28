<?php

namespace App\Lib\Actions\LessonGrades;

use App\Provider\LessonGradesProvider;
use Core\Action\EditAction;

class LessonGradeEditor extends LessonGradeCreator implements EditAction
{
    public function __construct(LessonGradesProvider $provider)
    {
        $this->provider = $provider;
        $this->formData = $this->provider->getFormData();
        $this->provider->setQuery(" WHERE id = {$this->formData['id']}");
        $this->provider->getLessonGrades();
        $this->originalData = $this->provider->getOriginalData();
    }

    public function edit(){
        $this->isExistsLessonGrade()
             ->isNameAlpha()
             ->setResult()
             ->editLessonGrade()
             ->sendResult();
    }
    
    public function editLessonGrade(){
        if($this->result){
            $this->provider->editLessonGrade();
            $this->originalData = $this->provider->getOriginalData();
        }
        return $this;
    }
}

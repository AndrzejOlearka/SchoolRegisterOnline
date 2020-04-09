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

    public function edit()
    {
        if (!$this->uniqueCheck()) {
            return $this;
        }

        $this->isCorrectGradeType()
            ->issetStudent()
            ->issetTeacher()
            ->issetSchoolSubject()
            ->sanitazeDate()
            ->setResult()
            ->setResult()
            ->editLessonGrade();

        return $this->sendResult();
    }

    public function editLessonGrade()
    {
        if ($this->result) {
            $this->provider->editLessonGrade();
            $this->originalData = $this->provider->getOriginalData();
        }
        return $this;
    }
}

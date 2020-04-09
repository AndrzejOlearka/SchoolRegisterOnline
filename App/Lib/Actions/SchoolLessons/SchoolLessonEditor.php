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
        $this->provider->setQuery(" WHERE number = {$this->formData['number']}");
        $this->provider->getSchoolLessons();
        $this->originalData = $this->provider->getOriginalData();
    }

    public function edit()
    {
        if (!$this->uniqueCheck()) {
            return $this;
        }

        $this->isNumberExists()
            ->isNumberValid()
            ->changeDateFormat()
            ->setResult()
            ->editSchoolLesson();

        return $this->sendResult();
    }

    public function isNumberExists()
    {
        if (empty($this->originalData)) {
            $this->errors['numberIsNotExists'] = 'Lesson Number with ' . $this->formData['number'] . ' is not exists';
        }
        return $this;
    }

    public function editSchoolLesson()
    {
        if ($this->result) {
            $this->provider->editSchoolLesson();
            $this->originalData = $this->provider->getOriginalData();
        }
        return $this;
    }
}

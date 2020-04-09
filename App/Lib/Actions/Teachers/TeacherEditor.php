<?php

namespace App\Lib\Actions\Students;

use App\Lib\Actions\Students\TeacherCreator;
use App\Provider\TeachersProvider;
use Core\Action\EditAction;

class TeacherEditor extends TeacherCreator implements EditAction
{
    public function __construct(TeachersProvider $provider)
    {
        $this->provider = $provider;
        $this->formData = $this->provider->getFormData();
        $this->provider->setQuery(" WHERE id = {$this->formData['id']}");
        $this->provider->getTeachers();
        $this->originalData = $this->provider->getOriginalData();
    }

    public function edit()
    {
        if (!$this->uniqueCheck()) {
            return $this;
        }

        $this->isSexPredefiniedValues()
            ->isFullnameAlpha()
            ->sanitazeSchoolSubjects()
            ->setResult()
            ->editTeacher();

        return $this->sendResult();
    }

    protected function editTeacher()
    {
        if ($this->result) {
            $this->provider->editTeacher();
            $this->originalData = $this->provider->getOriginalData();
        }
        return $this;
    }
}

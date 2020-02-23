<?php

namespace App\Lib\Actions\Students;

use App\Provider\StudentsProvider;
use Core\Action\EditAction;

class StudentEditor extends StudentCreator implements EditAction
{
    const MSG_EDIT_CLASS = 'Student has been edited successfully.';

    public function __construct(StudentsProvider $provider)
    {
        $this->provider = $provider;
        $this->formData = $this->provider->getFormData();
        $this->provider->setQuery(" WHERE id = {$this->formData['id']}");
        $this->provider->getClasses();
        $this->originalData = $this->provider->getOriginalData();
    }

    public function edit()
    {
        $this->isExistsStudentInThisClass()
             ->isSexPredefiniedValues()
             ->isClassInteger()
             ->isFullnameAlpha()
             ->isParentsAlpha()
             ->editStudent()
             ->sendResult(StudentCreator::MSG_CREATE_STUDENT);
    }

    public function editStudent()
    {
        if ($this->result) {
            $this->provider->editStudent();
            $this->originalData = $this->provider->getOriginalData();
        }
        return $this;
    }
}

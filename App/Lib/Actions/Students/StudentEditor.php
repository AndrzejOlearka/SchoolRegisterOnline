<?php

namespace App\Lib\Actions\Students;

use App\Provider\StudentsProvider;
use Core\Action\EditAction;

class StudentEditor extends StudentCreator implements EditAction
{
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
        if (!$this->uniqueCheck()) {
            return $this;
        }

        $this->isExistsStudentInThisClass()
            ->isSexPredefiniedValues()
            ->isClassInteger()
            ->isFullnameAlpha()
            ->isParentsAlpha()
            ->editStudent()
            ->sendResult();

        return $this->sendResult();
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

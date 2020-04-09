<?php

namespace App\Lib\Actions\SchoolSubjects;

use App\Provider\SchoolSubjectsProvider;
use Core\Action\EditAction;

class SchoolSubjectEditor extends SchoolSubjectCreator implements EditAction
{
    public function __construct(SchoolSubjectsProvider $provider)
    {
        $this->provider = $provider;
        $this->formData = $this->provider->getFormData();
        $this->provider->setQuery(" WHERE id = {$this->formData['id']}");
        $this->provider->getSchoolSubjects();
        $this->originalData = $this->provider->getOriginalData();
    }

    public function edit()
    {
        if (!$this->uniqueCheck()) {
            return $this;
        }

        $this->isExistsSchoolSubject()
            ->isNameAlpha()
            ->setResult()
            ->editSchoolSubject();

        return $this->sendResult();
    }

    public function editSchoolSubject()
    {
        if ($this->result) {
            $this->provider->editSchoolSubject();
            $this->originalData = $this->provider->getOriginalData();
        }
        return $this;
    }
}

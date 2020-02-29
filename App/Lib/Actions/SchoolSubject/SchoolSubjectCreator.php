<?php

namespace App\Lib\Actions\SchoolSubjects;

use App\Lib\Validators\ContentValidator;
use App\Lib\Validators\StringValidator;
use App\Provider\SchoolSubjectsProvider;
use Core\Action\AbstractAction;
use Core\Action\CreatorAction;

class SchoolSubjectCreator extends AbstractAction implements CreatorAction
{
    /**
     * __construct
     *
     * preparing form data and original data to proceed SchoolSubject creating
     *
     * @param object of SchoolSubjectsProvider $provider
     *
     * @return void
     */
    public function __construct(SchoolSubjectsProvider $provider)
    {
        $this->provider = $provider;
        $this->formData = $this->provider->getFormData();
        $this->provider->setQuery(" WHERE name = '{$this->formData['name']}'");
        $this->provider->getSchoolSubjects();
        $this->originalData = $this->provider->getOriginalData();
    }

    /**
     * process of SchoolSubjects creating
     * includes validation, sanitization, setting result and sending result
     *
     * @return void
     */
    public function create()
    {
        $this->isExistsSchoolSubject()
            ->isNameAlpha()
            ->setResult()
            ->addSchoolSubject()
            ->sendResult();
    }

    protected function isExistsSchoolSubject()
    {
        if (empty($this->originalData)) {
            return $this;
        }
        if ($this->compareRow($this->originalData[0]->name, $this->formData['name'])) {
            $this->errors['schoolSubjectExists'] = 'There is School Subject with this name';
        }
        return $this;
    }

    protected function isNameAlpha()
    {
        $result = $this->isAlpha($this->formData['name']);
        if (!$result) {
            $this->errors['schoolSubjectName'] = 'School subject name is not an alpha type';
        }
        return $this;
    }


    protected function addSchoolSubject()
    {
        if ($this->result) {
            $this->provider->addSchoolSubject();
            $this->originalData = $this->provider->getOriginalData();
        }
        return $this;
    }
}

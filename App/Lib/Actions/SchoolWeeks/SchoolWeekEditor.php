<?php

namespace App\Lib\Actions\SchoolWeeks;

use App\Lib\Actions\SchoolWeeks\SchoolWeekCreator;
use App\Provider\SchoolWeeksProvider;
use Core\Action\EditAction;

class SchoolWeekEditor extends SchoolWeekCreator implements EditAction
{
    public function __construct(SchoolWeeksProvider $provider)
    {
        $this->provider = $provider;
        $this->formData = $this->provider->getFormData();
        $this->setUnique();
        $this->provider->setQuery(" WHERE id = {$this->formData[$this->unique]}");
        $this->provider->getSchoolWeeks();
        $this->originalData = $this->provider->getOriginalData();
    }

    public function edit()
    {
        $uniqueCheck = $this->isInvalidUnique();
        if (!empty($uniqueCheck)) {
            $this->setResult(false);
            $this->sendResult();
            return $this;
        }
        $this->isExistsSchoolWeek()
            ->isWeekValid()
            ->isWeekInOrder()
            ->sanitazeDate()
            ->setResult()
            ->editSchoolWeek();

        return $this->sendResult();
    }

    protected function isExistsSchoolWeek()
    {
        $this->provider->setQuery(" WHERE number = '{$this->formData['number']}' ");
        $this->provider->getSchoolWeeks();
        $this->originalData = $this->provider->getOriginalData();
        if (!empty($this->originalData)) {
            $this->errors['SchoolWeekExists'] = 'There is Class Room with this number';
        }
        return $this;
    }

    public function editSchoolWeek()
    {
        if ($this->result) {
            $this->provider->editSchoolWeek();
            $this->originalData = $this->provider->getOriginalData();
        }
        return $this;
    }
}

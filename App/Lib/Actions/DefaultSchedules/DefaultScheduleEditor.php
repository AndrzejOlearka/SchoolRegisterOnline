<?php

namespace App\Lib\Actions\DefaultSchedules;

use App\Lib\Actions\DefaultSchedules\DefaultScheduleCreator;
use App\Provider\DefaultSchedulesProvider;
use Core\Action\EditAction;

class DefaultScheduleEditor extends DefaultScheduleCreator implements EditAction
{
    public function __construct(DefaultSchedulesProvider $provider)
    {
        $this->provider = $provider;
        $this->formData = $this->provider->getFormData();
        $this->setUnique();
        $this->provider->setQuery(" WHERE id = {$this->formData[$this->unique]}");
        $this->provider->getDefaultSchedules();
        $this->originalData = $this->provider->getOriginalData();
    }

    public function edit()
    {
        if (!$this->uniqueCheck()) {
            return $this;
        }

        $this->issetClass()
            ->isScheduleValidJson()
            ->isDescriptionValidString()
            ->setResult()
            ->editDefaultSchedule();

        return $this->sendResult();
    }

    public function editDefaultSchedule()
    {
        if ($this->result) {
            $this->provider->editDefaultSchedule();
            $this->originalData = $this->provider->getOriginalData();
        }
        return $this;
    }
}

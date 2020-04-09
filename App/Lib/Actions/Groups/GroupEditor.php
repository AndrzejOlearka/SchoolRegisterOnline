<?php

namespace App\Lib\Actions\Groups;

use App\Provider\GroupsProvider;
use Core\Action\EditAction;

class GroupEditor extends GroupCreator implements EditAction
{
    public function __construct(GroupsProvider $provider)
    {
        $this->provider = $provider;
        $this->formData = $this->provider->getFormData();
        $this->setUnique();
        $this->provider->setQuery(" WHERE id = {$this->formData[$this->unique]}");
        $this->provider->getGroups();
        $this->originalData = $this->provider->getOriginalData();
    }

    public function edit()
    {
        if (!$this->uniqueCheck()) {
            return $this;
        }

        $this->isExistsGroup()
            ->isNameAlphaNumeric()
            ->issetClass()
            ->issetTeacher()
            ->issetSchoolSubject()
            ->isStudentsValidJson()
            ->setResult();

        return $this->sendResult();
    }

    protected function isExistsGroup()
    {
        $this->provider->setQuery("
            WHERE class_id = {$this->formData['class_id']}
            AND name = '{$this->formData['name']}'
            AND id != {$this->formData['id']} "
        );
        $this->provider->getGroups();
        $this->originalData = $this->provider->getOriginalData();
        if (!empty($this->originalData)) {
            $this->errors['groupExists'] = 'There is group with this name in this class';
        }
        return $this;
    }

    public function editGroup()
    {
        if ($this->result) {
            $this->provider->editGroup();
            $this->originalData = $this->provider->getOriginalData();
        }
        return $this;
    }
}

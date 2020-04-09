<?php

namespace App\Lib\Actions\ClassRooms;

use App\Lib\Actions\ClassRooms\ClassRoomCreator;
use App\Provider\ClassRoomsProvider;
use Core\Action\EditAction;

class ClassRoomEditor extends ClassRoomCreator implements EditAction
{
    public function __construct(ClassRoomsProvider $provider)
    {
        $this->provider = $provider;
        $this->formData = $this->provider->getFormData();
        $this->setUnique();
        $this->provider->setQuery(" WHERE id = {$this->formData[$this->unique]}");
        $this->provider->getClassRooms();
        $this->originalData = $this->provider->getOriginalData();
    }

    public function edit()
    {
        if (!$this->uniqueCheck()) {
            return $this;
        }

        $this->isExistsClassRoom()
            ->isClassRoomAlphaNumeric()
            ->isTeachersValidJson()
            ->isDescriptionValidString()
            ->setResult()
            ->editClassRoom();

        return $this->sendResult();
    }

    protected function isExistsClassRoom()
    {
        $this->provider->setQuery(" WHERE number = '{$this->formData['number']}' ");
        $this->provider->getClassRooms();
        $this->originalData = $this->provider->getOriginalData();
        if (!empty($this->originalData)) {
            $this->errors['ClassRoomExists'] = 'There is Class Room with this number';
        }
        return $this;
    }

    public function editClassRoom()
    {
        if ($this->result) {
            $this->provider->editClassRoom();
            $this->originalData = $this->provider->getOriginalData();
        }
        return $this;
    }
}

<?php

namespace App\Lib\Actions\ClassRooms;

use Core\Action\CreatorAction;
use Core\Action\AbstractAction;
use App\Provider\ClassRoomsProvider;

class ClassRoomCreator extends AbstractAction implements CreatorAction
{
    /**
     * __construct
     *
     * preparing form data and original data to proceed class creating
     *
     * @param object of ClassRoomsProvider $provider
     *
     * @return void
     */
    public function __construct(ClassRoomsProvider $provider)
    {
        $this->provider = $provider;
        $this->formData = $this->provider->getFormData();
        $this->provider->setQuery(" WHERE number = {$this->formData['number']} ");
        $this->provider->getClassRooms();
        $this->originalData = $this->provider->getOriginalData();
    }

    /**
     * process of classes creating
     * includes validation, sanitization, setting result and sending result
     *
     * @return void
     */
    public function create()
    {
        $this->isExistsClassRoom()
            ->isClassRoomAlphaNumeric()
            ->isTeachersValidJson()
            ->isDescriptionValidString()
            ->setResult()
            ->addClassRoom();

        return $this->sendResult();
    }

    protected function isExistsClassRoom()
    {
        if (!empty($this->originalData)) {
            $this->errors['ClassRoomExists'] = 'There is ClassRoom with this name in this class';
        } 
        return $this;
    }

    protected function isClassRoomAlphaNumeric()
    {
        $result = $this->isAlphaNumeric($this->formData['number']);
        if (!$result) {
            $this->errors['classRoomNumber'] = 'class number has to be alphanumeric';
        }
        return $this;
    }

    protected function isTeachersValidJson(){
        if (empty($this->formData['teachers'])) {
            return $this;
        } 
        if(!$this->isValidJson($this->formData['teachers'])){
            $this->errors['invalidJsonTeachers'] = 'Teachers list is not a string that is valid json';
        }
        return $this;
    }

    protected function isDescriptionValidString(){
        if (empty($this->formData['description'])) {
            return $this;
        } 
        if(!$this->sanitazeString($this->formData['description'])){
            $this->errors['descriptionInvalid'] = 'Description contains invalid content';
        }
        return $this;
    }

    protected function addClassRoom()
    {
        if ($this->result) {
            $this->provider->addClassRoom();
            $this->originalData = $this->provider->getOriginalData();
        }
        return $this;
    }
}

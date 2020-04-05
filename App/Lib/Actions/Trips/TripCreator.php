<?php

namespace App\Lib\Actions\Trips;

use Core\Action\CreatorAction;
use Core\Action\AbstractAction;
use App\Provider\TripsProvider;

class TripCreator extends AbstractAction implements CreatorAction
{

    /**
     * __construct
     *
     * preparing form data and original data to proceed class creating
     *
     * @param object of TripsProvider $provider
     *
     * @return void
     */
    public function __construct(TripsProvider $provider)
    {
        $this->provider = $provider;
        $this->formData = $this->provider->getFormData();
    }

    /**
     * process of classes creating
     * includes validation, sanitization, setting result and sending result
     *
     * @return void
     */
    public function create()
    {
        $this->isNameValidString()
            ->isDescriptionValidString()
            ->isTeachersValidJson()
            ->isStudentsValidJson()
            ->isParentsValidJson()
            ->setResult()
            ->sanitazeDate()
            ->addTrip();

        return $this->sendResult();
    }

    protected function isNameValidString()
    {
        $result = $this->sanitazeString($this->formData['name']);
        if (!$result) {
            $this->errors['tripName'] = 'Trip name contains invalid content';
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

    protected function isTeachersValidJson(){
        if (empty($this->formData['teachers'])) {
            return $this;
        } 
        if(!$this->isValidJson($this->formData['teachers'])){
            $this->errors['invalidJsonTeachers'] = 'Teachers list is not a string that is valid json';
        }
        return $this;
    }

    protected function isStudentsValidJson(){
        if (empty($this->formData['students'])) {
            return $this;
        } 
        if(!$this->isValidJson($this->formData['students'])){
            $this->errors['invalidJsonStudents'] = 'Students list is not a string that is valid json';
        }
        return $this;
    }


    protected function isParentsValidJson(){
        if (empty($this->formData['parents'])) {
            return $this;
        } 
        if(!$this->isValidJson($this->formData['parents'])){
            $this->errors['invalidJsonParents'] = 'Parents list is not a string that is valid json';
        }
        return $this;
    }

    protected function sanitazeDate(){
        $this->formData['date_from'] = $this->changeToSqlDate($this->formData['date_from']);
        $this->formData['date_to'] = $this->changeToSqlDate($this->formData['date_to']);
        if(!$this->formData['date_from'] || !$this->formData['date_to']){
            $this->errors['invalidDate'] = 'Date has to be in correct date format.';
        }
        return $this;
    }

    protected function addTrip()
    {
        if ($this->result) {
            $this->provider->addTrip();
            $this->originalData = $this->provider->getOriginalData();
        }
        return $this;
    }
}

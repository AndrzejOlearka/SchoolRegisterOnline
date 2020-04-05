<?php

namespace App\Lib\Actions\Trips;

use App\Provider\TripsProvider;
use Core\Action\EditAction;

class TripEditor extends TripCreator implements EditAction
{
    public function __construct(TripsProvider $provider)
    {
        $this->provider = $provider;
        $this->formData = $this->provider->getFormData();
        $this->setUnique();
        $this->provider->setQuery(" WHERE id = {$this->formData[$this->unique]}");
        $this->provider->getTrips();
        $this->originalData = $this->provider->getOriginalData();
    }

    public function edit()
    {
        $uniqueCheck = $this->isInvalidUnique();
        if($uniqueCheck){
            $this->setResult(false);
            $this->sendResult();
            return $this;
        }
        $this->isNameValidString()
            ->isDescriptionValidString()
            ->isTeachersValidJson()
            ->isStudentsValidJson()
            ->isParentsValidJson()
            ->setResult()
            ->sanitazeDate()
            ->editTrip();

        return $this->sendResult();
    }
    
    public function editTrip()
    {
        if($this->result){
            $this->provider->editTrip();
            $this->originalData = $this->provider->getOriginalData();
        }
        return $this;
    }
}

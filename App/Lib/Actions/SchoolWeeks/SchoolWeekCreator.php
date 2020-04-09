<?php

namespace App\Lib\Actions\SchoolWeeks;

use Core\Action\CreatorAction;
use Core\Action\AbstractAction;
use App\Provider\SchoolWeeksProvider;

class SchoolWeekCreator extends AbstractAction implements CreatorAction
{
    /**
     * __construct
     *
     * preparing form data and original data to proceed class creating
     *
     * @param object of SchoolWeeksProvider $provider
     *
     * @return void
     */
    public function __construct(SchoolWeeksProvider $provider)
    {
        $this->provider = $provider;
        $this->formData = $this->provider->getFormData();
        $this->provider->setQuery(" WHERE week = {$this->formData['week']} ");
        $this->provider->getSchoolWeeks();
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
        $this->isExistsSchoolWeek()
            ->isWeekValid()
            ->isWeekInOrder()
            ->sanitazeDate()
            ->setResult()
            ->addSchoolWeek();

        return $this->sendResult();
    }

    protected function isExistsSchoolWeek()
    {
        if (!empty($this->originalData)) {
            $this->errors['SchoolWeekExists'] = 'There is school week with this name';
        } 
        return $this;
    }

    protected function isWeekValid()
    {
        if (empty($this->originalData)) {
            return $this;
        }
        if (
            !$this->isInteger($this->formData['week']) ||
            !$this->isNotZero($this->formData['week'])
        ){
            $this->errors['invalidWeek'] = 'Week number has to be an integer';
        }
        return $this;
    }

    protected function isWeekInOrder(){
        $numbers = [];
        if (empty($this->originalData)) {
            return $this;
        }
        foreach($this->originalData as $key => $data){
            $numbers[] = $data->day;
        }
        $nextInOrder = max($numbers) + 1;
        if($this->formData['day'] != $nextInOrder){
            $this->errors['nextInOrder'] = 'Next day in Order is '.$nextInOrder;
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

    protected function addSchoolWeek()
    {
        if ($this->result) {
            $this->provider->addSchoolWeek();
            $this->originalData = $this->provider->getOriginalData();
        }
        return $this;
    }
}

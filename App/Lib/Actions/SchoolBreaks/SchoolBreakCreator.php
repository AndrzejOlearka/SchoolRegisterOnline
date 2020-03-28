<?php

namespace App\Lib\Actions\SchoolBreaks;

use App\Provider\SchoolBreaksProvider;
use Core\Action\AbstractAction;
use Core\Action\CreatorAction;

class SchoolBreakCreator extends AbstractAction implements CreatorAction
{
    /**
     * __construct
     *
     * preparing form data and original data to proceed SchoolBreak creating
     *
     * @param object of SchoolBreaksProvider $provider
     *
     * @return void
     */
    public function __construct(SchoolBreaksProvider $provider)
    {
        $this->provider = $provider;
        $this->formData = $this->provider->getFormData();
        $this->provider->setQuery(" WHERE number = number");
        $this->provider->getSchoolBreaks();
        $this->originalData = $this->provider->getOriginalData();
    }

    /**
     * process of SchoolBreaks creating
     * includes validation, sanitization, setting result and sending result
     *
     * @return void
     */
    public function create()
    {
        $this->isNumberValid()
            ->isNumberInOrder()
            ->changeDateFormat()
            ->setResult()
            ->addSchoolBreak();

        return $this->sendResult();
    }

    protected function isNumberValid()
    {
        if (empty($this->originalData)) {
            return $this;
        }
        if (
            !$this->isInteger($this->formData['number']) ||
            !$this->isTinyInteger($this->formData['number']) || 
            !$this->isNotZero($this->formData['number'])
        ){
            $this->errors['invalidNumber'] = 'Break Number has to be an integer between 1 and 255';
        }
        return $this;
    }

    protected function isNumberInOrder(){
        $numbers = [];
        if (empty($this->originalData)) {
            return $this;
        }
        foreach($this->originalData as $key => $data){
            $numbers[] = $data->number;
        }
        $nextInOrder = max($numbers) + 1;
        if($this->formData['number'] != $nextInOrder){
            $this->errors['nextInOrder'] = 'Next Number in Order is '.$nextInOrder;
        }
        return $this;
    }

    protected function changeDateFormat(){
        if (empty($this->originalData['date_start'])) {
            return $this;
        }
        $date = date('H:i', strtotime($this->originalData['date_start']));
        if(empty($date)){
            $this->errors['invalidStartDate'] = 'Date Start is Invalid';
        } else {
            $this->originalData['date_start'] = $date;
        }
        if (empty($this->originalData['date_end'])) {
            return $this;
        }
        $date = date('H:i', strtotime($this->originalData['date_end']));
        if(empty($date)){
            $this->errors['invalidEndDate'] = 'Date End is Invalid';
        } else {
            $this->originalData['date_end'] = $date;
        }
        return $this;
    }

    protected function addSchoolBreak()
    {
        if ($this->result) {
            $this->provider->addSchoolBreak();
            $this->originalData = $this->provider->getOriginalData();
        }
        return $this;
    }
}

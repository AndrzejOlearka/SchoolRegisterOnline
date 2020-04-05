<?php

namespace App\Lib\Actions\SchoolDays;

use Core\Action\CreatorAction;
use Core\Action\AbstractAction;
use App\Provider\SchoolDaysProvider;

class SchoolDayCreator extends AbstractAction implements CreatorAction
{

    /**
     * __construct
     *
     * preparing form data and original data zto proceed class creating
     *
     * @param object of SchoolDaysProvider $provider
     *
     * @return void
     */
    public function __construct(SchoolDaysProvider $provider)
    {
        $this->provider = $provider;
        $this->formData = $this->provider->getFormData();
        $this->provider->setQuery(" WHERE day = day ");
        $this->provider->getSchoolDays();
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
        $this->isDayValid()
            ->isDayInOrder()
            ->isWeekdayOnlyAlpha()
            ->sanitazeDate()
            ->setResult()
            ->sanitazeDate()
            ->addSchoolDay();

        return $this->sendResult();
    }

    protected function isDayValid()
    {
        if (empty($this->originalData)) {
            return $this;
        }
        if (
            !$this->isInteger($this->formData['day']) ||
            !$this->isNotZero($this->formData['day'])
        ){
            $this->errors['invalidDay'] = 'Day number has to be an integer';
        }
        return $this;
    }

    protected function isDayInOrder(){
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

    protected function isWeekdayOnlyAlpha()
    {
        if(!$this->isAlpha($this->formData['weekday'])){
            $this->errors['weekdayNotAlpha'] = 'Weekday is not an alpha type';
        }
        return $this;
    }


    protected function sanitazeDate(){
        $this->formData['date'] = $this->changeToSqlDate($this->formData['date']);
        if(!$this->formData['date']){
            $this->errors['invalidDate'] = 'Date has to be in correct date format.';
        }
        return $this;
    }

    protected function addSchoolDay()
    {
        if ($this->result) {
            $this->provider->addSchoolDay();
            $this->originalData = $this->provider->getOriginalData();
        }
        return $this;
    }
}

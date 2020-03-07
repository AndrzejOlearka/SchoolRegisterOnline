<?php

namespace App\Lib\Actions\SchoolLessons;

use App\Provider\SchoolLessonsProvider;
use Core\Action\AbstractAction;
use Core\Action\CreatorAction;

class SchoolLessonCreator extends AbstractAction implements CreatorAction
{
    /**
     * __construct
     *
     * preparing form data and original data to proceed SchoolLesson creating
     *
     * @param object of SchoolLessonsProvider $provider
     *
     * @return void
     */
    public function __construct(SchoolLessonsProvider $provider)
    {
        $this->provider = $provider;
        $this->formData = $this->provider->getFormData();
        $this->provider->getSchoolLessons();
        $this->originalData = $this->provider->getOriginalData();
    }

    /**
     * process of SchoolLessons creating
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
            ->addSchoolLesson();

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

            $this->errors['invalidNumber'] = 'Lesson Number has to be an integer between 1 and 255';
        }
        return $this;
    }

    protected function isNumberInOrder(){
        $numbers = [];
        if (empty($this->originalData)) {
            return $this;
        }
        d($this->originalData);
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

    protected function addSchoolLesson()
    {
        if ($this->result) {
            $this->provider->addSchoolLesson();
            $this->originalData = $this->provider->getOriginalData();
        }
        return $this;
    }
}

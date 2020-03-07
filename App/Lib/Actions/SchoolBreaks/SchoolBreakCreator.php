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
        $this->provider->setQuery(" WHERE mark = '{$this->formData['mark']}' AND type = '{$this->formData['type']}' AND weight = {$this->formData['weight']}");
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
        $this->isExistsSchoolBreak()
            ->isTypePredefiniedValues()
            ->isMarkDescriptionAlphaNumeric()
            ->isWeightInteger()
            ->setResult()
            ->addSchoolBreak()
            ->sendResult();
    }

    protected function isExistsSchoolBreak()
    {
        if (empty($this->originalData)) {
            return $this;
        }
        if (!empty($this->originalData->id)){
            $this->errors['SchoolBreakExists'] = 'There is Grade Type with this mark, type and weight';
        }
        return $this;
    }

    protected function isTypePredefiniedValues(){
        if(!$this->isPredefinedValue($this->formData['type'], 2)){
            $this->errors['typeValue'] = 'SchoolBreak type value can be only 1 for subject grade and 2 for behaviour grade';
        }
        return $this;
    }

    protected function isMarkDescriptionAlphaNumeric(){
        if(!$this->isAlphaNumeric($this->formData['mark'])){
            $this->errors['markAlphaNumeric'] = 'Mark has to contain only letters and numbers';
        }
        if(!isset($this->formData['description'])){
            return $this;
        }
        if(!$this->isAlphaNumeric($this->formData['description'])){
            $this->errors['descriptionAlphaNumeric'] = 'Description has to contain only letters and numbers';
        }
        return $this;
    }

    protected function isWeightInteger(){
        if(!isset($this->formData['weight'])){
            return $this;
        }
        if(!$this->isInteger($this->formData['weight'])){
            $this->errors['weightNotInteger'] = 'Weight is not a integer value';
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

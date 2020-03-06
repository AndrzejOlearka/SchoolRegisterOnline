<?php

namespace App\Lib\Actions\Settings;

use App\Provider\RolesProvider;
use App\Provider\SettingsProvider;
use Core\Action\AbstractAction;
use Core\Action\CreatorAction;

class SettingCreator extends AbstractAction implements CreatorAction
{
    /**
     * __construct
     *
     * preparing form data and original data to proceed Settings creating
     *
     * @param object of SettingsProvider $provider
     *
     * @return void
     */
    public function __construct(SettingsProvider $provider)
    {
        $this->provider = $provider;
        $this->formData = $this->provider->getFormData();
        $this->provider->setQuery(" WHERE name = '{$this->formData['name']}' AND role_id = '{$this->formData['role_id']}' AND value = {$this->formData['value']}");
        $this->provider->getSettings();
        $this->originalData = $this->provider->getOriginalData();
    }

    /**
     * process of Settings creating
     * includes validation, sanitization, setting result and sending result
     *
     * @return void
     */
    public function create()
    {
        $this->isExistsSettings()
            ->isExistsSettings()
            ->isNameString()
            ->isValueAlphaNumeric()
            ->sanitazeDescription()
            ->issetRoleId()
            ->setResult()
            ->addSettings();

        return $this->sendResult();
    }

    protected function isExistsSettings()
    {
        if (empty($this->originalData)) {
            return $this;
        }
        if (!empty($this->originalData->id)){
            $this->errors['SettingsExists'] = 'There is setting for this role with this name and value';
        }
        return $this;
    }

    protected function isNameString(){
        if(!isset($this->formData['name'])){
            return $this;
        }
        if(!$this->isAlpha($this->formData['name'])){
            $this->errors['invalidName'] = 'Name of setting can contains only letters';
        }
        return $this;
    }

    protected function isValueAlphaNumeric(){
        if(!$this->isAlphaNumeric($this->formData['value'])){
            $this->errors['invalidValue'] = 'Value of setting can contains only letters and numbers';
        }
        return $this;
    }

    protected function sanitazeDescription(){
        if(!isset($this->formData['description'])){
            return $this;
        }
        $this->formData['description'] = $this->sanitazeString($this->formData['description']);
        return $this;
    }

    protected function issetRoleId()
    {
        $provider = new RolesProvider;
        $provider->setQuery(" WHERE id = {$this->formData['role_id']}");
        $provider->getRoles();
        if (empty($provider->getOriginalData()[0]->id)) {
            $this->errors['noRole'] = 'There is no role with this ID';
        }
        return $this;
    }

    protected function addSettings()
    {
        if ($this->result) {
            $this->provider->addSetting();
            $this->originalData = $this->provider->getOriginalData();
        }
        return $this;
    }
}

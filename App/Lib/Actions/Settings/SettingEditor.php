<?php

namespace App\Lib\Actions\Settings;

use App\Provider\SettingsProvider;
use Core\Action\EditAction;

class SettingEditor extends SettingCreator implements EditAction
{
    public function __construct(SettingsProvider $provider)
    {
        $this->provider = $provider;
        $this->formData = $this->provider->getFormData();
        $this->provider->setQuery(" WHERE id = {$this->formData['id']} ");
        $this->provider->getSettings();
        $this->originalData = $this->provider->getOriginalData();
    }

    public function edit(){
        $this->isExistsSettings()
            ->issetSimilarSetting()
            ->isNameString()
            ->isValueAlphaNumeric()
            ->sanitazeDescription()
            ->issetRoleId();

        return $this->sendResult();
    }

    protected function isExistsSettings()
    {
        if (!empty($this->originalData)) {
            return $this;
        }
        if (empty($this->originalData->id)){
            $this->errors['SettingsExists'] = 'There is no setting with this id';
        }
        return $this;
    }

    protected function issetSimilarSetting()
    {
        $this->provider->setQuery("
            WHERE 
                role_id = {$this->formData['role_id']}
                AND name = '{$this->formData['name']}'
                AND value = {$this->formData['value']} 
            ");
        $this->provider->getSettings();
        $this->originalData = $this->provider->getOriginalData();
        if(!empty($this->originalData)){
            $this->errors['SettingsExists'] = 'There is similar setting for this role';
        }
        return $this;
    }
    
    public function editSetting(){
        if($this->result){
            $this->provider->editSetting();
            $this->originalData = $this->provider->getOriginalData();
        }
        return $this;
    }
}

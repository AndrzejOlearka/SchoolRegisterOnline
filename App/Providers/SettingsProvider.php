<?php

namespace App\Provider;

use App\Lib\Filters\SettingFilter;
use Core\Provider\AbstractProvider;

class SettingsProvider extends AbstractProvider
{
    public function __construct()
    {
        $this->model = 'App\\Model\\Setting';
        $this->table = $this->model::TABLE;
    }

    public function getSettings()
    {
        $filter = new SettingFilter($this);
        $this->query ?: $this->query = $filter->SettingsTableFilter();
        $this->originalData = $filter->setFilterData(self::data("SELECT * FROM {$this->table}{$this->query}", $this->model))->filterProcessing();
        return $this;
    }

    public function addSetting()
    {
        $this->originalData = self::insert("INSERT INTO {$this->table} ", $this->model, $this->getFormData());
        return $this;
    }

    public function editSetting()
    {
        $this->originalData = self::update("UPDATE {$this->table} SET ", $this->model, $this->getFormData());
        return $this;
    }

    public function deleteSetting()
    {
        $this->originalData = self::delete("DELETE FROM {$this->table} WHERE id = ?", $this->model, [$this->getFormData()['id']]);
        return $this;
    }
}

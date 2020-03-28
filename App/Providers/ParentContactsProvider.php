<?php

namespace App\Provider;

use App\Lib\Filters\ParentContactFilter;
use Core\Provider\AbstractProvider;

class ParentContactsProvider extends AbstractProvider
{
    public function __construct()
    {
        $this->model = 'App\\Model\\ParentContact';
        $this->table = $this->model::TABLE;
    }

    public function getParentContacts()
    {
        $filter = new ParentContactFilter($this);
        $this->query ?: $this->query = $filter->ParentContactsTableFilter();
        $this->originalData = $filter->setFilterData(self::data("SELECT * FROM {$this->table}{$this->query}", $this->model))->filterProcessing();
        return $this;
    }

    public function addParentContact()
    {
        $this->originalData = self::insert("INSERT INTO {$this->table} ", $this->model, $this->getFormData());
        return $this;
    }

    public function editParentContact()
    {
        $this->originalData = self::update("UPDATE {$this->table} SET ", $this->model, $this->getFormData());
        return $this;
    }

    public function deleteParentContact()
    {
        $this->originalData = self::delete("DELETE FROM {$this->table} WHERE id = ?", $this->model, [$this->getFormData()['id']]);
        return $this;
    }
}

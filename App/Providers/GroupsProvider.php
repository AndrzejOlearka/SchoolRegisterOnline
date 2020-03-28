<?php

namespace App\Provider;

use App\Lib\Filters\GroupFilter;
use Core\Provider\AbstractProvider;

class GroupsProvider extends AbstractProvider
{
    protected $model;
    protected $table;

    public function __construct()
    {
        $this->model = 'App\\Model\\Group';
        $this->table = $this->model::TABLE;
    }

    public function getGroups()
    {
        $filter = new GroupFilter($this);
        $this->query ?: $this->query = $filter->groupsTableFilter();
        $this->originalData = $filter->setFilterData(self::data("SELECT * FROM {$this->table}{$this->query}", $this->model))->filterProcessing();
        return $this;
    }

    public function addGroup()
    {
        $this->originalData = self::insert("INSERT INTO {$this->table} ", $this->model, $this->getFormData());
        return $this;
    }

    public function editGroup()
    {
        $this->originalData = self::update("UPDATE {$this->table} SET ", $this->model, $this->getFormData());
        return $this;
    }

    public function deleteGroup()
    {
        $this->originalData = self::delete("DELETE FROM {$this->table} WHERE id = ?", $this->model, [$this->getFormData()['id']]);
        return $this;
    }
}

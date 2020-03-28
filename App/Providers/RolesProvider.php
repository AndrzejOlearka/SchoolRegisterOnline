<?php

namespace App\Provider;

use App\Lib\Filters\RoleFilter;
use Core\Provider\AbstractProvider;

class RolesProvider extends AbstractProvider
{
    public function __construct()
    {
        $this->model = 'App\\Model\\Role';
        $this->table = $this->model::TABLE;
    }

    public function getRoles()
    {
        $filter = new RoleFilter($this);
        $this->query ?: $this->query = $filter->RolesTableFilter();
        $this->originalData = $filter->setFilterData(self::data("SELECT * FROM {$this->table}{$this->query}", $this->model))->filterProcessing();
        return $this;
    }

    public function addRole()
    {
        $this->originalData = self::insert("INSERT INTO {$this->table} ", $this->model, $this->getFormData());
        return $this;
    }

    public function editRole()
    {
        $this->originalData = self::update("UPDATE {$this->table} SET ", $this->model, $this->getFormData());
        return $this;
    }

    public function deleteRole()
    {
        $this->originalData = self::delete("DELETE FROM {$this->table} WHERE id = ?", $this->model, [$this->getFormData()['id']]);
        return $this;
    }
}

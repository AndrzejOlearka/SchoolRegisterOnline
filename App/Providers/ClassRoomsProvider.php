<?php

namespace App\Provider;

use Core\Provider\AbstractProvider;
use App\Lib\Filters\ClassRoomFilter;

class ClassRoomsProvider extends AbstractProvider
{
    protected $model;
    protected $table;

    public function __construct()
    {
        $this->model = 'App\\Model\\ClassRoom';
        $this->table = $this->model::TABLE;
    }

    public function getClassRooms()
    {
        $filter = new ClassRoomFilter($this);
        $this->query ?: $this->query = $filter->classRoomFilter();
        $this->originalData = $filter->setFilterData(self::data("SELECT * FROM {$this->table}{$this->query}", $this->model))->filterProcessing();
        return $this;
    }

    public function addClassRoom()
    {
        $this->getResult(self::insert("INSERT INTO {$this->table} ", $this->model, $this->getFormData()));
        return $this;
    }

    public function editClassRoom()
    {
        $this->getResult(self::update("UPDATE {$this->table} SET ", $this->model, $this->getFormData()));
        return $this;
    }

    public function deleteClassRoom()
    {
        $this->originalData = self::delete("DELETE FROM {$this->table} WHERE id = ?", $this->model, [$this->getFormData()['id']]);
        return $this;
    }
}

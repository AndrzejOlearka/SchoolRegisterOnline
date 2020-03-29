<?php

namespace App\Provider;

use App\Lib\Filters\MessageFilter;
use Core\Provider\AbstractProvider;

class MessagesProvider extends AbstractProvider
{
    protected $model;
    protected $table;

    public function __construct()
    {
        $this->model = 'App\\Model\\Message';
        $this->table = $this->model::TABLE;
    }

    public function getMessages()
    {
        $filter = new MessageFilter($this);
        $this->query ?: $this->query = $filter->MessagesTableFilter();
        $this->originalData = $filter->setFilterData(self::data("SELECT * FROM {$this->table}{$this->query}", $this->model))->filterProcessing();
        return $this;
    }

    public function addMessage()
    {
        $this->originalData = self::insert("INSERT INTO {$this->table} ", $this->model, $this->getFormData());
        return $this;
    }

    public function editMessage()
    {
        $this->originalData = self::update("UPDATE {$this->table} SET ", $this->model, $this->getFormData());
        return $this;
    }

    public function deleteMessage()
    {
        $this->originalData = self::delete("DELETE FROM {$this->table} WHERE id = ?", $this->model, [$this->getFormData()['id']]);
        return $this;
    }
}

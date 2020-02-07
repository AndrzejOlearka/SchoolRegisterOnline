<?php

namespace App\Lib\Filters;

use Core\Request\Request;
use App\Provider\ClassesProvider;

class BasicFilter
{
    /**
     * prepare sql query with "where" and "and" only
     *
     * @param  mixed $optionalFields
     *
     * @return void
     */
    protected function onlyOptionalFilter()
    {
        $query = '';
        $optionalFieldIterator = 0;
        
        $optionalFields = $this->provider->getOptionalFields();
        foreach ($this->provider->getFormData() as $fieldname => $value) {
            if (!in_array($fieldname, $optionalFields) || !$this->hasModelProperty($fieldname)){
                continue;
            }
            if ($optionalFieldIterator == 0) {
                $query .= " WHERE {$fieldname} = {$value} ";
            } else {
                $query .= " AND {$fieldname} = {$value} ";
            }
            $optionalFieldIterator++;
        }
        return $query;
    }

    protected function hasModelProperty($fieldname){
        $model = $this->provider->getModel();
        return property_exists($fieldname, $model) ? true : false;
    }
}

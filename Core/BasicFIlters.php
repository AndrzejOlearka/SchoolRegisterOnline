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
    protected function onlyOptionalFilter($optionalFields)
    {
        $query = '';
        $optionalFieldIterator = 0;
        foreach ($this->formData as $typeData) {
            foreach ($typeData as $fieldname => $value) {
                if (!in_array($fieldname, $optionalFields)) {
                    continue;
                }
                if ($optionalFieldIterator == 0) {
                    $query .= " WHERE {$fieldname} = {$value} ";
                } else {
                    $query .= " AND {$fieldname} = {$value} ";
                }
                $optionalFieldIterator++;
            }
        }
        return $query;
    }
}

<?php

namespace Core\Providers\Filters;

class BasicFilter
{
    /**
     * onlyOptionalFilter
     * 
     * accepts also fields for WHERE LIKE queries
     * accepts also fields for WHERE IN queries
     *
     * @param array $likeOptional
     * @param array $inOptional
     *
     * @return string with full query
     */
    protected function onlyOptionalFilter(array $likeOptional = [], $inOptional = []  )
    {
        $query = '';
        $optionalFieldIterator = 0;
        $data = $this->provider->getFormData();
        if(empty($data)){
            return $query;
        }
        $optionalFields = $this->provider->getOptionalFields();
        
        foreach ($this->provider->getFormData() as $fieldname => $value) {
            if (!in_array($fieldname, $optionalFields) || !$this->hasModelProperty($fieldname)){
                continue;
            }
            if ($optionalFieldIterator == 0) {
                if(in_array($fieldname, $likeOptional)){
                    $query .= " WHERE ({$fieldname} = '{$value}' OR {$fieldname} LIKE '{$value},%' OR '%,$value,%' OR '%,{$value}') ";
                } else {
                    $query .= " WHERE {$fieldname} = '{$value}' ";
                }
            } else {
                if (in_array($fieldname, $likeOptional)) {
                    $query .= " AND ({$fieldname} = '{$value}' OR {$fieldname} LIKE '{$value},%' OR '%,$value,%' OR '%,{$value}') ";
                } else {
                    $query .= " AND {$fieldname} = '{$value}' ";
                }
            }
            $optionalFieldIterator++;
        }
        return $query;
    }

    /**
     * hasModelProperty
     *
     * @param string $fieldname
     *
     * @return boolean if property of that model exists
     */
    protected function hasModelProperty($fieldname){
        $model = $this->provider->getModel();
        return property_exists($model, $fieldname) ? true : false;
    }
}

<?php

namespace Core\Providers\Filters;

class BasicFilter
{
    protected $filtering;
    protected $provider;
    protected $filterData;
    protected $controllerName;
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
                $query .= " WHERE {$fieldname} = '\"{$value}\"' ";
            } else {
                $query .= " AND {$fieldname} = '\"{$value}\"' ";
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

    /**
     * prepare request filters to other providers from api defined filters
     *
     * @return void
     */
    protected function requestFilters(){
        $data = $this->provider->getFiltersFields();
        foreach($data as $filter){
            if(isset($this->provider->getFormData()[$filter])){
                $this->filtering = true;
                $this->filters[] = $this->parseFilter($filter);
            }
        }
        return $this;
    }

    /**
     * parse filter from request version to className or MethodName
     *
     * @param string $filter
     *
     * @return void
     */
    private function parseFilter($filter){
        $first = preg_replace('/with_/', '', $filter);
        $string = explode('_', $first);
        foreach($string as $key => $value){
            if($key == 0){
                $filter = $value;
            } else {
                $filter .= ucfirst($value);
            }
        }
        return $filter;
    }

    /**
     * set original data from provider to filter 
     *
     * @param array from provider
     *
     * @return void
     */
    public function setFilterData($filterData){
        $this->filterData = $filterData;
        return $this;
    }

    /**
     * fitler process for every possible table for this endpoint
     *
     * @param array $tables of possible tables
     *
     * @return array of filtered data
     */
    public function filterProcessing(){
        if(!$this->filtering){
            return $this->filterData;
        }
        $this->controllerName = $this->provider->getControllerName();
        foreach($this->filterData as $key => $singleData){
            foreach ($this->filters as $table){
                $returnedData = $this->filterData[$key]->$table = $this->getSingleTablesData($table, $singleData->id);
                if($returnedData){   
                    $this->filterData[$key]->$table = $returnedData;
                }
            }
        }
        return $this->filterData;
    }

    /**
     * get to one row one package of data
     *
     * @param string $table
     * @param mixed $id
     *
     * @return void
     */
    private function getSingleTablesData($table, $id){
        $provider = 'App\\Provider\\'.ucfirst($table).'Provider';
        if(class_exists($provider)){
            $dataProvider = new $provider;
            $const = $dataProvider->getForeignKeyConst($this->controllerName);
        } else {
            return false;
        }
        $dataProvider->setQuery(" WHERE {$const} = {$id}");
        $getter = 'get'.ucfirst($table);
        $dataProvider->{$getter}();
        return $dataProvider->getOriginalData();
    }
}

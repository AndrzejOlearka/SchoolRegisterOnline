<?php

namespace Core\Model;

use Core\Database\Connection;

class AbstractModel implements ModelInterface
{
    protected $table;
    
    public function getTable(){
        return $this->table;
    }
}

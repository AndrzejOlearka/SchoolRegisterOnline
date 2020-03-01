<?php

namespace App\Model;

use Core\Model\AbstractModel;

/**
 * SchoolBreak model
 *
 */
class SchoolBreak extends AbstractModel 
{
    /**
     * model table name
     *
     * @var string
     */
    const TABLE = 'school_breaks';

    public $number;

    public $date_start;

    public $date_end;
}

<?php

namespace App\Model;

use Core\Model\AbstractModel;
use Core\Model\UniqueModelInterface;

/**
 * SchoolBreak model
 *
 */
class SchoolBreak extends AbstractModel implements UniqueModelInterface
{
    /**
     * model table name
     *
     * @var string
     */
    const TABLE = 'school_breaks';
    
    const UNIQUE = 'number';

    public $number;

    public $date_start;

    public $date_end;
}

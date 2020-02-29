<?php

namespace App\Model;

use Core\Model\AbstractModel;

/**
 * SchoolSubject model
 *
 */
class SchoolSubject extends AbstractModel 
{
    /**
     * model table name
     *
     * @var string
     */
    const TABLE = 'school_subjects';

    public $id;

    public $name;
}

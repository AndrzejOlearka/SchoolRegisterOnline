<?php

namespace App\Model;

use Core\Model\AbstractModel;

/**
 * ParentContact model
 *
 */
class ParentContact extends AbstractModel 
{
    /**
     * model table name
     *
     * @var string
     */
    const TABLE = 'parents_contacts';

    public $id;

    public $class_id;

    public $description;
}

<?php

namespace App\Model;

use Core\Model\AbstractModel;
use Core\Model\PrimaryModelInterface;

/**
 * ParentContact model
 *
 */
class ParentContact extends AbstractModel implements PrimaryModelInterface
{
    /**
     * model table name
     *
     * @var string
     */
    const TABLE = 'parents_contacts';

    const ENUM_PARENT = ['mother', 'father', 'guardian', 'other'];

    public $id;

    public $student_id;

    public $parent;

    public $user_id;

    public $description;
}

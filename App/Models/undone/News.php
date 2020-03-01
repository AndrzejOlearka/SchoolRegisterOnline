<?php

namespace App\Model;

use Core\Model\AbstractModel;

/**
 * News model
 *
 */
class News extends AbstractModel 
{
    /**
     * model table name
     *
     * @var string
     */
    const TABLE = 'news';

    public $id;

    public $user_id;

    public $description;
}

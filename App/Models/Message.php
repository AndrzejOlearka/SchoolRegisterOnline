<?php

namespace App\Model;

use Core\Model\AbstractModel;

/**
 * Message model
 *
 */
class Message extends AbstractModel 
{
    /**
     * model table name
     *
     * @var string
     */
    const TABLE = 'messages';

    public $id;

    public $user_id;

    public $template_id;

    public $subject;

    public $content;

    public $recipients;

    public $created_date;

    public $updated_date;
}

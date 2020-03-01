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

    public $recipients_ids;

    public $template;

    public $subject;

    public $message;
}

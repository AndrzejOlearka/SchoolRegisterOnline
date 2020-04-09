<?php

namespace App\Lib\Actions\Messages;

use App\Provider\MessagesProvider;
use Core\Action\EditAction;

class MessageEditor extends MessageCreator implements EditAction
{
    public function __construct(MessagesProvider $provider)
    {
        $this->provider = $provider;
        $this->formData = $this->provider->getFormData();
        $this->setUnique();
        $this->provider->setQuery(" WHERE id = {$this->formData[$this->unique]}");
        $this->provider->getMessages();
        $this->originalData = $this->provider->getOriginalData();
    }

    public function edit()
    {
        if (!$this->uniqueCheck()) {
            return $this;
        }

        $this->issetTemplate()
            ->isSubjectLengthValid()
            ->isRecipientsValidJson()
            ->sanitazeDate()
            ->setResult()
            ->editMessage();

        return $this->sendResult();
    }

    public function editMessage()
    {
        if ($this->result) {
            $this->provider->editMessage();
            $this->originalData = $this->provider->getOriginalData();
        }
        return $this;
    }
}

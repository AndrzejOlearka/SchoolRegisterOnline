<?php

namespace App\Lib\Actions\Messages;

use Core\Action\CreatorAction;
use App\Provider\UsersProvider;
use Core\Action\AbstractAction;
use App\Provider\ClassesProvider;
use App\Provider\MessagesProvider;
use App\Provider\TeachersProvider;
use App\Lib\Validators\NumberValidator;
use App\Lib\Validators\StringValidator;
use App\Lib\Validators\ContentValidator;
use App\Provider\SchoolSubjectsProvider;

class MessageCreator extends AbstractAction implements CreatorAction
{
    /**
     * __construct
     *
     * preparing form data and original data to proceed class creating
     *
     * @param object of MessagesProvider $provider
     *
     * @return void
     */
    public function __construct(MessagesProvider $provider)
    {
        $this->provider = $provider;
        $this->formData = $this->provider->getFormData();
    }

    /**
     * process of classes creating
     * includes validation, sanitization, setting result and sending result
     *
     * @return void
     */
    public function create()
    {
        $this->issetUser()
            ->issetTemplate()
            ->isSubjectLengthValid()
            ->isRecipientsValidJson()
            ->sanitazeDate()
            ->setResult()
            ->addMessage();

        return $this->sendResult();
    }

    protected function issetUser()
    {
        if(!isset($this->formData['user_id'])) {
            return $this;
        }
        $provider = new UsersProvider;
        $provider->setQuery(" WHERE id = {$this->formData['user_id']}");
        $provider->getUsers();
        if (empty($provider->getOriginalData()[0]->id)) {
            $this->errors['noUser'] = 'There is no user with this ID';
        }
        return $this;
    } 

    protected function issetTemplate()
    {
        /*
        if(!isset($this->formData['user_id'])) {
            return $this;
        }
        $provider = new MessageTemplatesProvider;
        $provider->setQuery(" WHERE id = {$this->formData['template_id']}");
        $provider->getTemplates();
        if (empty($provider->getOriginalData()[0]->id)) {
            $this->errors['noTemplate'] = 'There is no template with this ID';
        }
        return $this;
        */
        return $this;
    } 

    protected function isSubjectLengthValid(){
        if(!$this->IsLengthValid($this->formData['subject'], null, 1000)){
            $this->errors['SubjectTooLong'] = 'Subject can contains only 1000 chars';
        }
        return $this;
    }

    protected function isRecipientsValidJson(){
        if (empty($this->formData['recipients'])) {
            return $this;
        } 
        if(!$this->isValidJson($this->formData['recipients'])){
            $this->errors['invalidJsonRecipients'] = 'Recipients list is not a string that is valid json';
        }
        return $this;
    }

    protected function sanitazeDate(){
        if(!isset($this->formData['created_date'])){
            return $this;
        }
        $this->formData['created_date'] = $this->changeToSqlDate($this->formData['created_date']);
        if(!$this->formData['created_date']){
            $this->errors['invalidDate'] = 'Date has to be in correct date format.';
        }
        return $this;
    }

    protected function addMessage()
    {
        if ($this->result) {
            $this->provider->addMessage();
            $this->originalData = $this->provider->getOriginalData();
        }
        return $this;
    }
}

<?php

namespace App\Lib\Actions\News;

use App\Provider\NewsProvider;
use Core\Action\CreatorAction;
use App\Provider\UsersProvider;
use Core\Action\AbstractAction;

class NewsCreator extends AbstractAction implements CreatorAction
{
    /**
     * __construct
     *
     * preparing form data and original data to proceed class creating
     *
     * @param object of NewsProvider $provider
     *
     * @return void
     */
    public function __construct(NewsProvider $provider)
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
            ->isSubjectLengthValid()
            ->sanitazeDate()
            ->setResult()
            ->addNews();

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

    protected function isSubjectLengthValid(){
        if(!$this->IsLengthValid($this->formData['subject'], null, 1000)){
            $this->errors['SubjectTooLong'] = 'Subject can contains only 1000 chars';
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

    protected function addNews()
    {
        if ($this->result) {
            $this->provider->addNews();
            $this->originalData = $this->provider->getOriginalData();
        }
        return $this;
    }
}

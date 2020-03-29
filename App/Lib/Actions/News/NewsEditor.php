<?php

namespace App\Lib\Actions\News;

use App\Provider\NewsProvider;
use Core\Action\EditAction;

class NewsEditor extends NewsCreator implements EditAction
{
    public function __construct(NewsProvider $provider)
    {
        $this->provider = $provider;
        $this->formData = $this->provider->getFormData();
        $this->setUnique();
        $this->provider->setQuery(" WHERE id = {$this->formData[$this->unique]}");
        $this->provider->getAllNews();
        $this->originalData = $this->provider->getOriginalData();
    }

    public function edit()
    {
        $uniqueCheck = $this->isInvalidUnique();
        if(!empty($uniqueCheck)){
            $this->setResult(false);
            $this->sendResult();
            return $this;
        }
        $this->issetUser()
            ->isSubjectLengthValid()
            ->sanitazeDate()
            ->setResult()
            ->addNews();

        $this->sendResult();
    }
    public function editNews()
    {
        if($this->result){
            $this->provider->editNews();
            $this->originalData = $this->provider->getOriginalData();
        }
        return $this;
    }
}

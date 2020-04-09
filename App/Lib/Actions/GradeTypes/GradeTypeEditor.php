<?php

namespace App\Lib\Actions\GradeTypes;

use App\Provider\GradeTypesProvider;
use Core\Action\EditAction;

class GradeTypeEditor extends GradeTypeCreator implements EditAction
{
    public function __construct(GradeTypesProvider $provider)
    {
        $this->provider = $provider;
        $this->formData = $this->provider->getFormData();
        $this->provider->setQuery(" WHERE id = {$this->formData['id']}");
        $this->provider->getGradeTypes();
        $this->originalData = $this->provider->getOriginalData();
    }

    public function edit()
    {
        if (!$this->uniqueCheck()) {
            return $this;
        }

        $this->isExistsGradeType()
            ->isTypePredefiniedValues()
            ->isMarkDescriptionAlphaNumeric()
            ->isWeightInteger()
            ->setResult()
            ->editGradeType();

        return $this->sendResult();
    }

    public function editGradeType()
    {
        if ($this->result) {
            $this->provider->editGradeType();
            $this->originalData = $this->provider->getOriginalData();
        }
        return $this;
    }
}

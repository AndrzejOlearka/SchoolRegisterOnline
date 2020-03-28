<?php

namespace App\Lib\Actions\Roles;

use App\Provider\RolesProvider;
use Core\Action\AbstractAction;
use Core\Action\CreatorAction;

class RoleCreator extends AbstractAction implements CreatorAction
{
    /**
     * __construct
     *
     * preparing form data and original data to proceed Role creating
     *
     * @param object of RolesProvider $provider
     *
     * @return void
     */
    public function __construct(RolesProvider $provider)
    {
        $this->provider = $provider;
        $this->formData = $this->provider->getFormData();
        $this->provider->setQuery(" WHERE name = '{$this->formData['name']}' ");
        $this->provider->getRoles();
        $this->originalData = $this->provider->getOriginalData();
    }

    /**
     * process of Roles creating
     * includes validation, sanitization, setting result and sending result
     *
     * @return void
     */
    public function create()
    {
        $this->isExistsRole()
            ->isExistsRole()
            ->isRoleAlphaNumAndSomeChars()
            ->sanitazeDescription()
            ->setResult()
            ->addRole();

        return $this->sendResult();
    }

    protected function isExistsRole()
    {
        if (empty($this->originalData)) {
            return $this;
        }
        if (!empty($this->originalData->id)){
            $this->errors['RoleExists'] = 'There is Role with this name';
        }
        return $this;
    }

    protected function isRoleAlphaNumAndSomeChars(){
        if(!$this->isAlphaNumericAndBasicChars($this->formData['name'])){
            $this->errors['RoleValidString'] = 'Role name can contains only numbers, letters and some special chars (\'-\', \'_\', \'+\')';
        }
        return $this;
    }

    protected function sanitazeDescription(){
        if(!isset($this->formData['description'])){
            return $this;
        }
        $this->formData['description'] = $this->sanitazeString($this->formData['description']);
        return $this;
    }

    protected function addRole()
    {
        if ($this->result) {
            $this->provider->addRole();
            $this->originalData = $this->provider->getOriginalData();
        }
        return $this;
    }
}

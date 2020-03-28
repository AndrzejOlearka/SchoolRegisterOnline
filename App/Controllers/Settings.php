<?php

namespace App\Controllers;

use Core\Request\Response;
use Core\Controller\Controller;
use App\Lib\Actions\Settings\SettingEditor;
use App\Lib\Actions\Settings\SettingCreator;

/**
 * Settings controller
 *
 */
class Settings extends Controller
{
    /**
     * Get Settings with basic data
     *
     * @return void
     */
    protected function getSettings()
    {
        Response::json($this->provider->getSettings()->getOriginalData());
    }

    protected function addSetting(){
        $action = new SettingCreator($this->provider);
        Response::json($action->create(), $action->getResult(), $action->getErrors());
    }

    protected function editSetting(){
        $action = new SettingEditor($this->provider);
        Response::json($action->edit(), $action->getResult(), $action->getErrors());
    }
    
    protected function deleteSetting(){
        Response::json($this->provider->deleteSetting());
    }
}

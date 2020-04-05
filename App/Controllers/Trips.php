<?php

namespace App\Controllers;

use Core\Request\Response;
use Core\Controller\Controller;
use App\Lib\Actions\Trips\{TripEditor, TripCreator};

/**
 * Trips controller
 *
 */
class Trips extends Controller
{
    /**
     * Get classes with basic data
     *
     * @return void
     */
    protected function getTrips()
    {
        Response::json($this->provider->getTrips()->getOriginalData());
    }

    protected function addTrip(){
        $action = new TripCreator($this->provider);
        Response::json($action->create(), $action->getResult(), $action->getErrors());
    }

    protected function editTrip(){
        $action = new TripEditor($this->provider);
        Response::json($action->edit(), $action->getResult(), $action->getErrors());
    }
    
    protected function deleteTrip(){
        Response::json($this->provider->deleteTrip());
    }
}

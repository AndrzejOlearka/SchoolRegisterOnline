<?php

namespace App\Controllers;

use Core\Request\Response;
use Core\Controller\Controller;
use App\Lib\Actions\SchoolSubjects\SchoolSubjectEditor;
use App\Lib\Actions\SchoolSubjects\SchoolSubjectCreator;

/**
 * SchoolSubjects controller
 *
 */
class SchoolSubjects extends Controller
{
    /**
     * Get SchoolSubjects with basic data
     *
     * @return void
     */
    protected function getSchoolSubjects()
    {
        Response::json($this->provider->getSchoolSubjects()->getOriginalData());
    }

    protected function addSchoolSubject(){
        $action = new SchoolSubjectCreator($this->provider);
        Response::json($action->create(), $action->getResult(), $action->getErrors());
    }

    protected function editSchoolSubject(){
        $action = new SchoolSubjectEditor($this->provider);
        Response::json($action->edit(), $action->getResult(), $action->getErrors());
    }
    
    protected function deleteSchoolSubject(){
        Response::json($this->provider->deleteSchoolSubject());
    }
}

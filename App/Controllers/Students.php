<?php

namespace App\Controllers;

use Core\View\View;
use Core\Request\Request;
use Core\Controller\Controller;

/**
 * Students controller
 *
 */
class Students extends Controller
{

    /**
     * Before filter
     *
     * @return void
     */
    protected function before()
    {}

    /**
     * After filter
     *
     * @return void
     */
    protected function after()
    {}

    /**
     * Show the index page
     *
     * @return void
     */
    public function saveStudent()
    {
        $studentsProvider = new StudentsProvider;
        $usersProvider->setProviderData(Request::post()->get('student_id'))->saveStudent();
    }

    public function deleteStudent()
    {
        $studentsProvider = new StudentsProvider;
        $usersProvider->setProviderData(Request::post()->get('student_id'))->deleteStudent();
    }

    public function saveGrade()
    {
        $studentsProvider = new StudentsProvider;
        $usersProvider->setProviderData(Request::post()->get('student_id'))->saveStudent();
    }

    public function deleteGrade()
    {
        $studentsProvider = new StudentsProvider;
        $usersProvider->setProviderData(Request::post()->get('student_id'))->deleteStudent();
    }

    public function saveBehaviourNote()
    {
        $studentsProvider = new StudentsProvider;
        $usersProvider->setProviderData(Request::post()->get('student_id'))->saveBehaviourNote();
    }

    public function deleteBehaviourNote()
    {
        $studentsProvider = new StudentsProvider;
        $usersProvider->setProviderData(Request::post()->get('student_id'))->deleteBehaviourNote();
    }

    public function saveParentContact()
    {
        $studentsProvider = new StudentsProvider;
        $usersProvider->setProviderData(Request::post()->get('student_id'))->saveParentContact();
    }

    public function deleteParentContact()
    {
        $studentsProvider = new StudentsProvider;
        $usersProvider->setProviderData(Request::post()->get('student_id'))->deleteParentContact();
    }

    public function saveSemestralNote()
    {
        $studentsProvider = new StudentsProvider;
        $usersProvider->setProviderData(Request::post()->get('student_id'))->saveSemestralNote();
    }
    
    public function deleteParentContact()
    {
        $studentsProvider = new StudentsProvider;
        $usersProvider->setProviderData(Request::post()->get('student_id'))->deleteSemestralNote();
    }
    
}

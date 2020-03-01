<?php

namespace App\Lib\Actions\LessonGrades;

use Core\Action\CreatorAction;
use Core\Action\AbstractAction;
use App\Provider\StudentsProvider;
use App\Provider\TeachersProvider;
use App\Provider\GradeTypesProvider;
use App\Provider\LessonGradesProvider;
use App\Lib\Validators\StringValidator;
use App\Lib\Validators\ContentValidator;
use App\Provider\SchoolSubjectsProvider;

class LessonGradeCreator extends AbstractAction implements CreatorAction
{
    protected $lessonGradeType;
    /**
     * __construct
     *
     * preparing form data and original data to proceed LessonGrade creating
     *
     * @param object of LessonGradesProvider $provider
     *
     * @return void
     */
    public function __construct(LessonGradesProvider $provider)
    {
        $this->provider = $provider;
        $this->formData = $this->provider->getFormData();
        $this->lessonGradeType = $this->provider->getModel()::LESSON_GRADE_TYPE;
    }

    /**
     * process of LessonGrades creating
     * includes validation, sanitization, setting result and sending result
     *
     * @return void
     */
    public function create()
    {
        $this->isCorrectGradeType()
            ->issetStudent()
            ->issetTeacher()
            ->issetSchoolSubject()
            ->sanitazeDate()
            ->setResult()
            ->addLessonGrade()
            ->sendResult();
    }

    protected function isCorrectGradeType()
    {
        
        $provider = new GradeTypesProvider;
        $provider->setQuery(" WHERE id = {$this->formData['grade_type_id']} AND type = '{$this->lessonGradeType}'");
        $provider->getGradeTypes();
        $this->originalData = $provider->getOriginalData();
        if (empty($this->originalData[0]->id)) {
            $this->errors['wrongIdType'] = 'Wrong ID of grade or type is 1';
        }
        return $this;
    }

    protected function issetStudent()
    {
        $provider = new StudentsProvider;
        $provider->setQuery(" WHERE id = {$this->formData['student_id']}");
        $provider->getStudents();
        if (empty($provider->getOriginalData()[0]->id)) {
            $this->errors['noStudent'] = 'There is no student with this ID';
        }
        return $this;
    }

    protected function issetTeacher()
    {
        $provider = new TeachersProvider;
        $provider->setQuery(" WHERE id = {$this->formData['teacher_id']}");
        $provider->getTeachers();
        if (empty($provider->getOriginalData()[0]->id)) {
            $this->errors['noTeacher'] = 'There is no teacher with this ID';
        }
        return $this;
    }

    protected function issetSchoolSubject()
    {
        $provider = new SchoolSubjectsProvider;
        $provider->setQuery(" WHERE id = {$this->formData['school_subject_id']}");
        $provider->getSchoolSubjects();
        if (empty($provider->getOriginalData()[0]->id)) {
            $this->errors['noSubject'] = 'There is no school subject with this ID';
        }
        return $this;
    }

    protected function sanitazeDate(){
        if(!isset($this->formData['created_date'])){
            return;
        }
        $this->formData['created_date'] = $this->changeToSqlDate($this->formData['created_date']);
        if(!$this->formData['created_date']){
            $this->errors['invalidDate'] = 'Date has to be in correct date format.';
        }
        return $this;
    }

    protected function addLessonGrade()
    {
        if ($this->result) {
            $this->provider->addLessonGrade();
            $this->originalData = $this->provider->getOriginalData();
        }
        return $this;
    }
}

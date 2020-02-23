<?php

namespace App\Lib\Actions\Students;

use Core\Action\EditAction;
use App\Provider\TeachersProvider;
use App\Lib\Validators\NumberValidator;
use App\Lib\Validators\StringValidator;
use App\Lib\Validators\ContentValidator;
use App\Lib\Actions\Students\TeacherCreator;

class TeacherEditor extends TeacherCreator implements EditAction
{
    use StringValidator;
    use NumberValidator;
    use ContentValidator;

    const MSG_EDIT_TEACHER = 'Teacher has been edited successfully.';

    public function __construct(TeachersProvider $provider)
    {
        $this->provider = $provider;
        $this->formData = $this->provider->getFormData();
        $this->provider->setQuery(" WHERE id = {$this->formData['id']}");
        $this->provider->getTeachers();
        $this->originalData = $this->provider->getOriginalData();
    }

    public function edit(){

        $this->isSexPredefiniedValues()
             ->isFullnameAlpha()
             ->sanitazeSchoolSubjects()
             ->setResult()
             ->editTeacher()
             ->sendResult(TeacherEditor::MSG_EDIT_TEACHER);
    }

    protected function editTeacher(){
        if($this->result){
            $this->provider->editTeacher();
            $this->originalData = $this->provider->getOriginalData();
        }
        return $this;
    }
}

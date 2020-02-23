<?php

namespace App\Lib\Actions\Users;

use App\Provider\UsersProvider;
use App\Lib\Validators\NumberValidator;
use App\Lib\Validators\StringValidator;
use App\Lib\Validators\ContentValidator;

class Authentication extends Registration
{
    use StringValidator;
    use NumberValidator;
    use ContentValidator;

    const MSG_USER_VERIFY = 'User has been verified successfully.';

    public function __construct(UsersProvider $provider)
    {
        parent::__construct(...func_get_args());
    }

    public function verify(){

        $this->isUserExists()
             ->isPasswordVerified()
             ->setResult()
             ->sendResult(Authentication::MSG_USER_VERIFY);
    }

    protected function isUserExists(){
        if(empty($this->originalData)){
            $this->errors['userNotExists'] = 'There is no user with this email';
        }
        return $this;
    }

    private function isPasswordVerified(){
        if(!password_verify($this->formData['password'], $this->originalData->password)){
            $this->errors['wrongPassword'] = 'Wrong password.';
        }
        return $this;
    }
}

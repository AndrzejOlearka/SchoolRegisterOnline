<?php

namespace Core\Helpers;

class Encrypter
{
    /**
     * hash
     *
     * @param string $password
     *
     * @return string hashed
     */
    public static function hash($password){
        return password_hash($password, PASSWORD_DEFAULT);	
    }
}

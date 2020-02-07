<?php

namespace App\Lib\Validators;

trait ContentValidator{

   function issetRow($data){
       return empty($data) ? false : true;
   }

}

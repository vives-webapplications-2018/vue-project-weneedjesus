<?php

namespace App;

//http://thisinterestsme.com/php-user-registration-form/
class checkValid {

    function __construct($em, $pw){
        $this->em = $em;
        $this->pw = $pw;
    }

    function checkEmPw($em, $pw){
        $email = !empty($em) ? trim($em) : null;
        $pass = !empty($pw) ? trim($pw) : null;

        //TODO: need to check if username already exists (using PDO)
    }
}
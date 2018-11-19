<?php

namespace App\Connect;

//http://thisinterestsme.com/php-user-registration-form/
class register {

    function __construct(){
    }

    function registration($em, $pw, $cpw, $name, $lastname, $addr, $zip, $city, $owner){
            $hash_pw = validPw($pw, $cpw);
            $tempArr= array($em, $pw, $cpw, $name, $lastname, $addr, $zip, $city, $owner);
            $cleanArr = trim($tempArr);

            
        }
        //TODO: need to check if username already exists (using PDO)
   

    function trim($array){
        foreach($array as $item){
            if($item != $em){
                $item = !empty($item) ? trim($item) : null;
                $newArr->push($item);
            }else{
                if(valid($item)){
                    $item = !empty($item) ? trim($item) : null;
                    $newArr->push($item);
                }
            }
        }
        return $newArr;
    }

    function valid($em){
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "Invalid email format";
        }
        return !filter_var($email, FILTER_VALIDATE_EMAIL) === false;
    }

    function validPw($pw, $cpw){
        if($pw == $cpw){
            return md5($pw);
        }
        return "Passwords don't match!";
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model 
{
    public $timestamps = false;

    function trim($array){
        foreach($array as $item){
                $item = !empty($item) ? trim($item) : null;
                $newArr = array();
                array_push($newArr, $item);
        }
        return $newArr;
    }

    public function valid($em){
        if (!filter_var($em, FILTER_VALIDATE_EMAIL)){ 
            echo "Invalid email format";
        }
        return !filter_var($em, FILTER_VALIDATE_EMAIL) === false;
    }

    public function validPw($pw, $cpw){
        if($pw == $cpw){
            return md5($pw);
        }
        return "Passwords don't match!";
    }
}
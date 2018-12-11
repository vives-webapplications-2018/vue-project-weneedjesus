<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $timestamps = false;
  
//TODO: check if email already exists in db
    public function valid($em)
    {
        if (!filter_var($em, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email format";
            return false;
        }else  {
            if($this->emExists($em)){
                return !filter_var($em, FILTER_VALIDATE_EMAIL) === false;
            }
        }
    }

    public function emExists($em)
    {
        if (User::where('email', '=', $em)->exists()) {
            echo "E-mail already exists";
            return false;
        } else {
            return true;
        }
    }

    public function validPw($pw, $cpw)
    {
        if ($pw == $cpw) {
            return password_hash($pw, PASSWORD_BCRYPT);
        }
        return "Passwords don't match!";
    }
}

<?php

namespace App\Connect;
use App\Models\Kaffie;
use App\Connect\connect;

//http://thisinterestsme.com/php-user-registration-form/
class register {

    function __construct(){
    }

    public function registration($em, $pw, $cpw, $name, $lastname, $addr, $zip, $city, $owner){
            $hash_pw = $this->validPw($pw, $cpw);
            $tempArr= array($em, $hash_pw, $name, $lastname, $addr, $zip, $city, $owner);
            $cleanArr = $this->trim($tempArr);

            //Constructing the sql statement and prepare it.
            $sql = "SELECT COUNT(email) AS em FROM users WHERE email = :email";
            $stmt = $pdo->prepare($sql);

            //Binding the provided username to our prepared statement.
            $stmt->bindValue(':email', $cleanArr->em);
            $stmt->execute();
            
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if($row['em'] > 0){
                die('That e-mail already exists!');
            }
            //Preparing our INSERT statement
            $sql = "INSERT INTO users VALUES (:firstname, :lastname, :password, :email, :address, :zip, :city, :owner)";
            $stmt = $pdo->prepare($sql);

            //Binding values not professional way, TODO: 2 arrays fori

            $stmt->bindValue(':firstname', $cleanArr->name);
            $stmt->bindValue(':lastname', $cleanArr->lastname);
            $stmt->bindValue(':password', $cleanArr->hash_pw);
            $stmt->bindValue(':email', $cleanArr->em);
            $stmt->bindValue(':address', $cleanArr->addr);
            $stmt->bindValue(':zip', $cleanArr->zip);
            $stmt->bindValue(':city',$cleanArr->city);
            $stmt->bindValue(':owner', $cleanArr->owner);

            $result = $stmt->execute();
        }
        //TODO: need to check if username already exists (using PDO)
   
    function trim($array){
        foreach($array as $item){
            if($item != $em){
                $item = !empty($item) ? trim($item) : null;
                $newArr = array();
                array_push($newArr, $item);
            }else{
                if($this->valid($item)){
                    $item = !empty($item) ? trim($item) : null;
                    $newArr = array();
                    array_push($newArr, $item);
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

    public function validPw($pw, $cpw){
        if($pw == $cpw){
            return md5($pw);
        }
        return "Passwords don't match!";
    }
}
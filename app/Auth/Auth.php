<?php

namespace Cart\Auth;

use Cart\Models\User;

class Auth{

/*
    public function attempt($email, $password){
        //grab user by email
        $user = User::where('email', $email)->first();

        //if user doesnt exist return false
        if(!$user){
            return false;
        }
        
        if(password_verify($password, $user->password)){//standard password verify PHP method
            $_SESSION['user'] = $user->id;
            return true;
        }

        return false;
        //verify password for that user
        //set into session
    }
*/
}

?>
<?php

namespace Cart\Validation\Forms;

use Respect\Validation\Validator as v;

class SignupForm{

    public static function rules(){//Respect rules for validation
        return [
            'email' => v::noWhitespace()->notEmpty()->email(),
            'name' => v::noWhitespace()->notEmpty()->alpha(' '),
            'password' => v::noWhitespace()->notEmpty(),
        ];
    }

}
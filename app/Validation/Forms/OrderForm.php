<?php

namespace Cart\Validation\Forms;

use Respect\Validation\Validator as v;

class OrderForm{

    public static function rules(){//Respect rules for validation
        return [
            'email' => v::email(),
            'name' => v::alpha(' '),
            'address1' => v::alnum(' -'),
            'address2' => v::optional(v::alnum(' -')),
            'city' => v::alnum(' '),
            'state' => v::alnum(' '),
            'zip' => v::postalCode('US'),//may have to change to alnum
        ];
    }

}
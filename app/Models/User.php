<?php

namespace Cart\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model{//Eloquent will look for a table with plural version of 'User'

    protected $table = 'users';

    protected $fillable = [
        'email',
        'name',
        'password',

    ];

}

?>
<?php

namespace Cart\Models;

use Cart\Models\Order;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model{//Eloquent will look for a table with plural version of 'Customer'

protected $fillable = [
    'email',
    'name',
];

public function orders(){
    return $this->hasMany(Order::class);
}

}
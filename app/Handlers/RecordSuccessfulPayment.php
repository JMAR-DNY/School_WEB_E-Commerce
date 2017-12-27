<?php

namespace Cart\Handlers;


use Cart\Handlers\Contracts\HandlerInterface;

class RecordSuccessfulPayment implements HandlerInterface{


    public function handle($event){
        
    $tempTransactionID =   bin2hex(random_bytes(32));
    //$tempTransactionID = bin2hex(mcrypt_create_iv(22, MCRYPT_DEV_URANDOM));

        $event->order->payment()->create([
            'failed'=> false,
            'transaction_id'=> $tempTransactionID,
        ]);
    }
}
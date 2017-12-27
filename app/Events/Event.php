<?php

namespace Cart\Events;

use Cart\Handlers\Contracts\HandlerInterface;

class Event{

    protected $handlers = [];

    public function attach($handlers){

        if (is_array($handlers)){//tests to see if handlers is an array

            foreach ($handlers as $handler){
                if (!$handler instanceof HandlerInterface){
                    
                    continue;//handle method doesn't exist, continue

                }

                $this->handlers[] = $handler;
            }

            return;
        }

        if($handlers instanceof HandlerInterface){
            return;
        }

        $this->handlers[] = $handlers;//instantiates handlers array   
    }

    public function dispatch(){

        foreach ($this->handlers as $handler){
            $handler->handle($this);
        }
    }

}
<?php


namespace Cart\Support\Storage;

use Countable;
use Cart\Support\Storage\Contracts\StorageInterface;


class SessionStorage implements StorageInterface, Countable{

    protected $bucket;

    public function __constructor($bucket = 'default'){

        if(!isset($_SESSION[$bucket])){
            $_SESSION[$bucket] = [];
        }

        $this->$bucket = $bucket;
    }

    public function set($index, $value){
        $_SESSION[$this->bucket][$index] = $value;
    }

    public function get($index){

        if(!$this->exists($index)){
            return null;
        }

        return $_SESSION[$this->bucket][$index];

    }

    public function exists($index){
        return isset($_SESSION[$this->bucket][$index]);
    }

    public function all(){
        if (!isset($_SESSION[$this->bucket])){//if session object doeesn't exist then return
            return;
        }
        return $_SESSION[$this->bucket];//else return session object
    }

    public function unsetItem($index){//may have to change this
        if($this->exists($index)){
            unset($_SESSION[$this->bucket][$index]);
        }
        if (count($_SESSION) === 0)
        {
          session_destroy();
        }
    }

    public function clear(){
        unset($_SESSION[$this->bucket]);
    }

    public function count(){
        return count($this->all());
    }
}

?>
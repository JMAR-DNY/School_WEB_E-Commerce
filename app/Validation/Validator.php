<?php

namespace Cart\Validation;

//error_reporting(E_ALL ^ E_DEPRECATED);//remove depreciated errors due to different PHP versions

use Cart\Validation\Contracts\ValidatorInterface;
use Psr\HTTP\Message\ServerRequestInterface as Request;
use Respect\Validation\Exceptions\NestedValidationException;

class Validator implements ValidatorInterface{

    protected $errors = [];


    public function validate(Request $request, array $rules)
    {
        foreach ($rules as $field => $rule){
            try{
                $rule->setName(ucfirst($field))->assert($request->getParam($field));
            }catch(NestedValidationException $e){
                $this->errors[$field] = $e->getMessages();//puts errors into the error array
            }
        }

        //die();


        $_SESSION['errors'] =$this->errors;//puts errorsarray into session data to output to the form

        return $this;
    }

    public function fails(){

        return !empty($this->errors);//fails if error array is not empty
    }
}
?>
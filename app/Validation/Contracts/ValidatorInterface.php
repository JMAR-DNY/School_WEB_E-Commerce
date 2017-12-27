<?php

namespace Cart\Validation\Contracts;

use Psr\HTTP\Message\ServerRequestInterface as Request;


interface ValidatorInterface{

    public function validate(Request $request, array $rules);

    public function fails();

}
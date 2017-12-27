<?php

namespace Cart\Controllers;



use Psr\HTTP\Message\ResponseInterface as Response;
use BrainTree_ClientToken;


class BraintreeController{

    public function token(Response $response){
        //die('Index');
        //return $response->withJson([
        //'token'=> BrainTree_ClientToken::generate(),
        //]);
        //echo($clientToken = Braintree_ClientToken::generate());
        //$clientToken = Braintree_ClientToken::generate([
        //    "customerId" => $aCustomerId
        //]);
    }
}

?>

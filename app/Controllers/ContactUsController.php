<?php

namespace Cart\Controllers;

use Slim\Router;
use Slim\Views\Twig;

use Psr\HTTP\Message\ResponseInterface as Response;
use Psr\HTTP\Message\ServerRequestInterface as Request;


class ContactUsController{


    public function index(Request $request, Response $response, Twig $view){
        
        return $view->render($response, 'contact/index.twig');

    }

}

?>
<?php

//This middleware is called to assist main application logic

namespace Cart\Middleware;

use Slim\Views\Twig;

class OldInputMiddleware{

    protected $view;

    public function __construct(Twig $view){
        $this->view = $view;
    }

    public function __invoke($request, $response, $next){//invoke is a slim method

        if (isset($_SESSION['old'])){
            $this->view->getEnvironment()->addGlobal('old', $_SESSION['old']);
        }

        $_SESSION['old'] = $request->getParams();//gets all the data thats passed through the form

        $response = $next($request, $response);
        return $response;
    }
}

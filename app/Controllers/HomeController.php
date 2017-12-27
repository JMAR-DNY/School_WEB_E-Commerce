<?php

namespace Cart\Controllers;

use Slim\Views\Twig;
use Cart\Models\Product;
use Psr\HTTP\Message\ResponseInterface as Response;
use Psr\HTTP\Message\ServerRequestInterface as Request;


//use Cart\Models\User;

class HomeController{

    public function index(Request $request, Response $response, Twig $view,Product $product){
        
        //$user = User::where('email', 'asdfkjh@asdf.com')->first();
        //var_dump($user);
        //die('Index');
        


        $products = $product->get();
        //var_dump($products->first()->title);
        //die();

        return $view->render($response, 'home.twig', [

            'products' => $products
            
        ]);
    }

}

?>
<?php

namespace Cart\Controllers;

use Slim\Router;
use Slim\Views\Twig;
use Cart\Models\Product;
use Cart\Basket\Basket;
use Psr\HTTP\Message\ResponseInterface as Response;
use Psr\HTTP\Message\ServerRequestInterface as Request;
use Cart\Basket\Exceptions\QuantityExceededException;

class CartController{

    protected $basket;

    protected $product;

    
    public function __construct(Basket $basket, Product $product){
        $this->basket = $basket;
        $this->product = $product;
    }

    public function index(Request $request, Response $response, Twig $view){
        
        $this->basket->refresh();
        return $view->render($response, 'cart/index.twig');

    }

    public function add($slug, $quantity, Request $request, Response $response, Router $router){

        $product = $this->product->where('Slug', $slug)->first();

        if(!$product){

            return $response->withRedirect($router->pathFor('home'));
        }

       try{
            $this->basket->add($product, $quantity);
       }catch(QuantitityExceededException $e){
///
       }

       return $response->withRedirect($router->pathFor('cart.index'));
    }

    public function update($slug, Request $request, Response $response, Router $router){

        $product = $this->product->where('slug', $slug)->first();


        if (!$product){
            return $response->withRedirect($router->PathFor('home'));
            }

            try{
                $this->basket->update($product, $request->getParam('quantity'));
           }catch(QuantitityExceededException $e){
    ///
           }

           return $response->withRedirect($router->pathFor('cart.index'));
        }

        

}

?>
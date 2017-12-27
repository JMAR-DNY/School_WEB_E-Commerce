<?php

namespace Cart\Controllers;

use Slim\Router;
use Slim\Views\Twig;
use Cart\Basket\Basket;
use Cart\Models\Product;
use Cart\Models\Customer;
use Cart\Models\Address;
use Cart\Models\Order;
use Psr\HTTP\Message\ResponseInterface as Response;
use Psr\HTTP\Message\ServerRequestInterface as Request;
use Cart\Validation\Contracts\ValidatorInterface;
use Cart\Validation\Forms\OrderForm;

class OrderController{

    protected $basket;
    protected $router;
    protected $validator;

    public function __construct(Basket $basket, Router $router, ValidatorInterface $validator){
        $this->basket = $basket;
        $this->router = $router;
        $this->validator = $validator;
    }


    public function index(Request $request, Response $response, Twig $view){
       $this->basket->refresh(); 

        if(!$this->basket->subTotal()){
            return $response->withRedirect($this->router->pathFor('cart.index'));
        }

       return $view->render($response, 'order/index.twig'); 
    }


    public function show($hash, Request $request, Response $response, Twig $view, Order $order){
        $order = $order->with(['address', 'products'])->where('hash', $hash)->first();

        if (!$order){
            return $response->withRedirect($this->router->pathFor('home'));
        }

        return $view->render($response, 'order/show.twig', [
            'order'=> $order,  

        ]);
    }




    //This is where orders are created at the checkout
    public function create(Request $request, Response $response, Customer $customer, Address $address){
        $this->basket->refresh();

        if(!$this->basket->subTotal()){
            return $response->withRedirect($this->router->pathFor('cart.index'));
        }

       $validation = $this->validator->validate($request, OrderForm::rules());

       
       if($validation->fails()){

           return $response->withRedirect($this->router->pathFor('order.index'));

       }
        
       $hash = bin2hex(random_bytes(32));
    
       $customer = $customer->firstOrCreate([//this will check if a customer exists in database
        'email' => $request->getParam('email'),
        'name' => $request->getParam('name'),

       ]);

       $address = $address->firstOrCreate([
        'address1'=> $request->getParam('address1'),
        'address2'=> $request->getParam('address2'),
        'city'=> $request->getParam('city'),
        'state'=> $request->getParam('state'),
        'zip'=> $request->getParam('zip'),
       ]);

        $order = $customer->orders()->create([//create an order on a customer
            'hash' => $hash,
            'paid' => false,
            'total' => $this->basket->subTotal() + 17.38,
            'address_id' => $address->id,

        ]);

        $order->products()->saveMany(
            $this->basket->all(),
            $this->getQuantities($this->basket->all())

        );

        //INSERT payment gateway - handle payment event handling etc

        $event = new \Cart\Events\OrderWasCreated($order, $this->basket);

        $event->attach([    
            new \Cart\Handlers\MarkOrderPaid,
            new \Cart\Handlers\RecordSuccessfulPayment,
            //new \Cart\Handlers\UpdateStock,
            new \Cart\Handlers\EmptyBasket,
            
        ]);

        $event->dispatch();

//USE THIS TO DISPLAY ORDERS///////////////////////////////////
        return $response->withRedirect($this->router->PathFor('order.show', [
            'hash' => $hash,
        ]));


    }

    protected function getQuantities($items){
        $quantities =[];

        foreach ($items as $item){
            $quantities[] = ['quantity' => $item->quantity];
        }
        return $quantities;
    }
}

?>
<?php

namespace Cart\Controllers;

use Slim\Router;
use Slim\Views\Twig;
use Cart\Models\User;
use Cart\Auth\Auth;
use Cart\Validation\Contracts\ValidatorInterface;
use Psr\HTTP\Message\ResponseInterface as Response;
use Psr\HTTP\Message\ServerRequestInterface as Request;
use Cart\Validation\Forms\OrderForm;


class UserController{

    public function getSignOut(Request $request, Response $response,Router $router){

        //sign out
        unset($_SESSION['user']);

        //redirect
        return $response->withRedirect($router->pathFor('home'));
        
    }

    public function index(Request $request, Response $response, Twig $view){
        
        return $view->render($response, 'user/index.twig');

    }

    //renders view
    public function getSignIn(Request $request, Response $response, Twig $view){

        return $view->render($response, 'user/signin.twig');
    }

    //signs in
    public function postSignIn(Request $request, Response $response, Router $router){

        $email = $request->getParam('email');
        $password = $request->getParam('password');

        $user = User::where('email', $email)->first();
        
        //if user doesnt exist return false
        if(!$user){
            return $response->withRedirect($router->pathFor('user.getSignIn'));
            //redirect
        }
        
        if(password_verify($password, $user->password)){//standard password verify PHP method
            $_SESSION['user'] = $user->id;
            return $response->withRedirect($router->pathFor('home'));
        }
        return $response->withRedirect($router->pathFor('user.getSignIn'));


    }

    public function getSignUp(Request $request, Response $response, Router $router){

    }

    public function postSignUp(Request $request, Response $response, Router $router){
       
        //account sign up validation
        //$validation = $this->validator->validate($request, SignupForm::rules());


        $user = User::create([
        'email' => $request->getParam('email'),
        'name' => $request->getParam('name'),   
        'password' => password_hash($request->getParam('password'), PASSWORD_DEFAULT),
    ]);
    return $response->withRedirect($router->pathFor('home'));
        //var_dump($request->getParams());
    
    }
}

?>
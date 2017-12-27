<?php 

use Cart\App;
use Slim\Views\Twig;
use Illuminate\Database\Capsule\Manager as Capsule;




session_start();

require __DIR__ . '/../vendor/autoload.php';


$app = new App;

$container = $app->getContainer();

$capsule = new Capsule;//Illuminate Database using Eloquent from laravel 

$capsule->addConnection([

    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'marronja01',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
    'collation'=> 'utf8_unicode_ci',
    'prefix'=> '' 

]);

$capsule->setAsGlobal();
$capsule->bootEloquent();





//change to environmental variables composer require phpdotenv so that the tokens aren't hardcoded in
//Braintree_Configuration::environment('sandbox');
//Braintree_Configuration::merchantId('6hxczk3p5rnp8djy');
//Braintree_Configuration::publicKey('6fhgssmjymptsf34');
//Braintree_Configuration::privateKey('1209b4518b3360013c934e4501fde350');

//echo($clientToken = Braintree_ClientToken::generate());

require __DIR__ . '/../app/routes.php';

$app->add(new \Cart\Middleware\ValidationErrorsMiddleware($container->get(Twig::class)));
$app->add(new \Cart\Middleware\OldInputMiddleware($container->get(Twig::class)));

?>
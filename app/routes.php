<?php

$app->get('/', ['Cart\Controllers\HomeController', 'index'])->setName('home');

$app->get('/products/{slug}', ['Cart\Controllers\ProductController', 'get'])->setName('product.get');

$app->get('/contact', ['Cart\Controllers\ContactUsController', 'index'])->setName('contactUs.index');


$app->get('/user', ['Cart\Controllers\userController', 'index'])->setName('user.index');

$app->post('/user/postSignUp', ['Cart\Controllers\userController', 'postSignUp'])->setName('user.postSignUp');


$app->get('/user/signin', ['Cart\Controllers\userController', 'getSignIn'])->setName('user.getSignIn');

$app->post('/user/signin', ['Cart\Controllers\userController', 'postSignIn'])->setName('user.postSignIn');


$app->get('/user/signout', ['Cart\Controllers\userController', 'getSignOut'])->setName('user.getSignOut');


$app->get('/cart', ['Cart\Controllers\CartController', 'index'])->setName('cart.index');

$app->get('/cart/add/{slug}/{quantity}', ['Cart\Controllers\CartController', 'add'])->setName('cart.add');

$app->post('/cart/update/{slug}', ['Cart\Controllers\CartController', 'update'])->setName('cart.update');


$app->get('/order', ['Cart\Controllers\OrderController', 'index'])->setName('order.index');

$app->get('/order/{hash}', ['Cart\Controllers\OrderController', 'show'])->setName('order.show');

$app->post('/order', ['Cart\Controllers\OrderController', 'create'])->setName('order.create');

$app->get('/braintree/token', ['Cart\Controllers\BraintreeController', 'token'])->setName('braintree.token');

?>
<?php

error_reporting(E_ALL); ini_set('display_errors', 1);

require '../vendor/autoload.php';

$app = new \Slim\App(["settings" => array('displayErrorDetails' => true, 'addContentLengthHeader' => false)]);

$container = $app->getContainer();

$container['objDB'] = function () {
  return Order\classes\DB::getInstance();
};

// The following enables CORS
$app->options('/{routes:.+}', function($request, $response, $args) {
  return $response;
});
// The following enables CORS
$app->add(function($request, $response, $next) {
  $response = $next($request, $response);
  return $response
          ->withHeader('Access-Control-Allow-Origin', '*')
          ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
          ->withHeader('Access-Control-Allow-Methods', 'GET');
});

$app->get('/', Order\resources\Homepage::class . ':getHomepage');

$app->post('/order/{sOrderId}', Order\resources\Orders::class . ':saveOrder');
$app->get('/order/{sOrderId}', Order\resources\Orders::class . ':getOrder');


$app->run();

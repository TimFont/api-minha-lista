<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

//config database

require '../src/config/database.php';



$app = new \Slim\App;

$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Random, $name");

    return $response;
});

require '../src/config/routes.php';
$app->run();
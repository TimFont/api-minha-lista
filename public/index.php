<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

//config database

$settings =  require __DIR__ . '/../core/Settings.php';
$app = new \Slim\App($settings);



require __DIR__ . '/../core/Routes.php';
require __DIR__ . '/../core/Dependencies.php';
require __DIR__ . '/../core/Services.php';
$app->run();
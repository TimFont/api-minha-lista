<?php

$container = $app->getContainer();

$container['pdo'] = function ($c) {
    $pdo_config = $c->get('settings')['db'];
    $dsn = "pgsql:dbname=" . $pdo_config['database'] . ";host=" . $pdo_config['hostname'];
    $pdo = new PDO($dsn, $pdo_config['username'], $pdo_config['password']);
    $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    return $pdo;
};
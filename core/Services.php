<?php

    use App\services\NotesService;

    $container = $app->getContainer();

    $container['notes_service'] = function($c){
        return new NotesService($c->get('pdo'));
    };
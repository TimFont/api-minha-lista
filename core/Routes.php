<?php

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;


$app->group('/api', function(){
    
    $this->get('/notes', 'App\controllers\NotesController:getAllNotes');
});
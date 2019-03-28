<?php

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;


$app->group('/api', function(){
    
    $this->get('/notes', 'App\controllers\NotesController:getAllNotes');
    $this->post('/notes', 'App\controllers\NotesController:createNote');
    $this->get('/notes/{id}', 'App\controllers\NotesController:getById');
    $this->delete('/notes/{id}','App\controllers\NotesController:deleteNote');
    $this->put('/notes/{id}', 'App\controllers\NotesController:editNote');
});
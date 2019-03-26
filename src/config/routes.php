<?php

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

$app->group('/api', function(){
    
    $this->get('/notes', function(Request $request, Response $response){
        $query = 'SELECT * FROM public.notes';

        $db = new Database();

        $db = $db->connect();

        $stmt = $db->query($query);

        $notes = $stmt->fetchAll(PDO::FETCH_OBJ);

        $db = null;
        echo json_encode($notes);
    });
});
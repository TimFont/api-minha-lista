<?php
namespace App\controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Container;


    class NotesController {
        public function  __construct(Container $container){
            $this->container = $container;
        }

        private function getNotesService(){
            return $this->container->get('notes_service');
        }

        public function getAllNotes(Request $request, Response $response){
            $data = array('name' => 'Bob', 'age' => 40);
            echo $this->getNotesService()->logTest();
            return $response->withJson($data);
        }

    }

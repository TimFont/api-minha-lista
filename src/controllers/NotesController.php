<?php
namespace App\controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Container;
use App\models\Note;


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

        public function createNote(Request $request, Response $response){
            $requestData = $request->getParsedBody();

            
            if(!isset($requestData['title']) || !isset($requestData['content'])){
                $error = [
                    'error'=>'algum campo está vazio'
                ];

                return $response->withJson($error, 400);
            }else{

                $this->getNotesService()->registerNote($requestData['title'], $requestData['content']);
                $return = ['works'=>'teste'];
                return $response->withJson($return);
            }


            
        }

    }

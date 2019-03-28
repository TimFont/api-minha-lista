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

            $data = $this->getNotesService()->fetchAllNotes();
            return $response->withJson($data);

        }

        public function getById(Request $request, Response $response, array $args){

            $note = $this->getNotesService()->getById($args['id']);
            if(! empty($note)){
                return $response->withJson($note);
            }else{
                return $response->withJson(["error"=>"note not found"], 404);
            }
        }

        public function createNote(Request $request, Response $response){

            $requestData = $request->getParsedBody();         
            if(!isset($requestData['title']) || !isset($requestData['content'])){
                return $response->withJson(['error'=>'algum campo está vazio'], 400);
            }else{
                $newNote = $this->getNotesService()->registerNote($requestData['title'], $requestData['content']);
                return $response->withJson($newNote);
            }  
        }

        public function editNote(Request $request, Response $response, array $args){

            $newFields = $request->getParsedBody();
            $wrongFields = ["fields"=>[]];
            foreach($newFields as $field => $value){
                if($field != 'title' && $field != 'content'){
                    array_push($wrongFields['fields'], $field);
                }
            }
            if(empty($wrongFields["fields"])){
                $editedNote = $this->getNotesService()->editNote( $args['id'], $newFields);

                return $response->withJson($editedNote);
                
            }else {
                return $response->withJson(["error"=>"algum dos campos é invalido", "campos" => $wrongFields["fields"]]);
            }

        }

        public function deleteNote(Request $request, Response $response, array $args){

            if($this->getNotesService()->checkNote($args['id'])){
                $this->getNotesService()->deleteNote($args['id']);
                return $response->withJson(["mensagem"=>"nota excluida"]);
            }else{
                return $response->withJson(["error"=>"nota não encontrada"]);
            }
        }

    }

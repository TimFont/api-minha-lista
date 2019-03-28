<?php 

namespace App\services;

    class NotesService {
        public function __construct(\PDO $database){
            $this->database = $database;
        }

        public function logTest(){
            $query = 'SELECT * FROM public.notes';
        
            $stmt = $this->database->query($query);

            $notes = $stmt->fetchAll(\PDO::FETCH_OBJ);
            $database= null;

            return json_encode($notes);
        }

        public function registerNote($noteTitle, $noteContent){
            $query = 'INSERT INTO public.notes(title, content) VALUES(:title, :content);';

            $statement = $this->database->prepare($query);
            $statement->bindParam('title', $noteTitle);
            $statement->bindParam('content', $noteContent);

            $statement->execute();


        }
    }
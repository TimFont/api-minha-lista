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
    }
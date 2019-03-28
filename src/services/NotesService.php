<?php 

namespace App\services;

    class NotesService {
        public function __construct(\PDO $database){
            $this->database = $database;
        }

        public function fetchAllNotes(){

            $query = 'SELECT * FROM public.notes';   
            $stmt = $this->database->query($query);
            $notes = $stmt->fetchAll(\PDO::FETCH_OBJ);
            return $notes;

        }

        public function getById($id){

            $query = 'SELECT * FROM public.notes WHERE id_note = :id;';

            $statement = $this->database->prepare($query);
            $statement->bindParam('id', $id);
            $statement->execute();
            $note = $statement->fetchAll(\PDO::FETCH_OBJ);

            return $note;

        }

        public function checkNote($id){
            if (empty($this->getById($id))){
                return false;
            }else{
                return true;
            }
        }

        public function registerNote($noteTitle, $noteContent){
            $query = 'INSERT INTO public.notes(title, content) VALUES(:title, :content);';

            $statement = $this->database->prepare($query);
            $statement->bindParam('title', $noteTitle);
            $statement->bindParam('content', $noteContent);

            $statement->execute();

            return $this->getById($this->database->lastInsertId());

        }

        public function deleteNote($id){
            $query = 'DELETE FROM public.notes WHERE id_note = :id';

            $statement = $this->database->prepare($query);
            $statement->bindParam('id', $id);
            $statement->execute();

        }

        public function editNote($id, array $args){
            
            $quersy = 'UPDATE public.notes SET title = \"batatao\" where id_note = 5;';
            $query = 'UPDATE public.notes SET ';
            $counter = 0;
           foreach($args as $field => $value){
                $query = $query . $field . ' = '. '\'' .  $value . '\''.  (($counter == count($args) -1) ? ' ' : ', ');
                $counter++;
            }
            $query = $query . 'WHERE id_note = :id;';

            $statement = $this->database->prepare($query);
            $statement->bindParam('id', $id);
            $statement->execute();
            
            return $this->getById($id);

            //return $query;
        }
    }
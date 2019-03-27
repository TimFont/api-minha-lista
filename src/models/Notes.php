<?php

    namespace App\models;

    use App\config\Database;

    class Notes {

        public function __construct(){
            
        }
    
        static function getAllNotes(){
            $query = 'SELECT * FROM public.notes';
            $database = new Database();
            $database = $database->connect();
            $stmt = $database->query($query);

            $notes = $stmt->fetchAll(\PDO::FETCH_OBJ);
            $database= null;

            return json_encode($notes);
        }
    }
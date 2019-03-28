<?php

    namespace App\models;


    class Note {
        private $title;
        private $content;


        public function __construct($title, $content){
            $this->title = $title;
            $this->content = $content;
        }
    
    }
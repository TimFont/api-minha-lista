<?php

    class Database {
        private $db_user = 'jamreqqwjunhxc';
        private $db_host = 'ec2-50-17-227-28.compute-1.amazonaws.com';
        private $db_password = '329bdfbb9114ff823580c9edb3d3cda1d78979edb74c696eb9fe365489625214';
        private $db_name = 'd4r6fcs99kkcb4';


        public function connect(){
            $pgsql_connect_str = "pgsql:host=$this->db_host;dbname=$this->db_name";
            $dbConnection = new PDO($pgsql_connect_str, $this->db_user, $this->db_password);
            $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $dbConnection;
        }
    }
<?php

    class Conexao{

        private $servername = "localhost";
        private $username = "root";
        private $password = "root";
        private $dbname = "Filmorama";

        public function getConexao(){

            try {
                $conexao = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
                // set the PDO error mode to exception
                $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $conexao;

            } catch(PDOException $e) {
               throw $e;
            }
        }



    }

?>
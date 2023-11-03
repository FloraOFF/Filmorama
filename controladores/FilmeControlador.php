<?php
    require_once "../conexao/Conexao.php";
    require_once "../modelos/Filme.php";

    class FilmeControlador{

        private $filme;

        public function salvar($filme){

            try {
                $conexao = new Conexao();
                $conn = $conexao->getConexao();               
                $filme->salvar($conn);
        
                echo "New record created successfully";
            } catch(PDOException $e) {
                echo "<br>" . $e->getMessage();
            }
        
        }

        public function buscarTodos() {
            $conexao = new Conexao();
            $conn = $conexao->getConexao();               
        
            $filme = new Filme();
            return $filme->buscarTodos($conn);
        }
    }

?>
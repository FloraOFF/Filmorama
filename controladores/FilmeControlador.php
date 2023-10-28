<?php
    require_once "../conexao/Conexao.php";
    require_once "../modelos/Filme.php";

    class FilmeControlador{
        private filme;

        public function salvar($filme){

            try {
        
                $conexao = new Conexao();
                $conn = $conexao->getConexao();               
                $filme->salvar($conn);
        
                echo "New record created successfully";
            } catch(PDOException $e) {
                echo "<br>" . $e->getMessage();
                $conn->rollback();
            }
        
        }

        public function buscarTodos() {
            filme = new Filme();
            $filmes = filme->buscarTodos();
            
            header('Content-Type: application/json');

            echo json_encode($filmes);
        }
    }

?>
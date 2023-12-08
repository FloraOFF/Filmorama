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
        
                echo "Novo filme adicionado com sucesso";
            } catch(PDOException $e) {
                echo "Erro ao adicionar filme:" . $e->getMessage();
            }
        
        }

        public function buscarTodos() {
            $conexao = new Conexao();
            $conn = $conexao->getConexao();               
        
            $filme = new Filme();
            return $filme->buscarTodos($conn);
        }

        public function delete($id) {
            $conexao = new Conexao();
            $conn = $conexao->getConexao(); 

            try {
                $filme = new Filme();
                $filme->setId($id);
                return $filme->delete($conn);
                echo "Filme deletado com sucesso!";
            } catch(PDOException $e) {
                echo "Erro ao deletar filme: " . $e->getMessage();
            }

        }
    }

?>
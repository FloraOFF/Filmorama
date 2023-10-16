<?php
    require_once "../conexao/Conexao.php";
    require_once "../modelos/Filme.php";

    class FilmeControlador{

        public function salvar($Filme){

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
    }

?>
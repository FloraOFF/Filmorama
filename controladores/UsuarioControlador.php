<?php
    require_once "../conexao/Conexao.php";
    require_once "../modelos/Usuario.php";
    require_once "../modelos/Endereco.php";

    class UsuarioControlador{

        private $conn;

        public function salvar($usuario){

            try {
        
                $conexao = new Conexao();
                $conn = $conexao->getConexao();               
                $conn->beginTransaction();
                $usuario->salvar($conn);

                $endereco = $usuario->getEndereco();
                $endereco->setIdUsuario($usuario->getId());
                $endereco->salvar($conn);
        
                $conn->commit();
        
                echo "New record created successfully";
            } catch(PDOException $e) {
                echo "<br>" . $e->getMessage();
                $conn->rollback();
            }
        
        }

        public function autenticar($usuario){
            $conexao = new Conexao();
            $conn = $conexao->getConexao();  
            
            try{
                $usuario = $usuario->autenticar($conn);
                return $usuario;        
              
            }catch(AutenticarException $erro){
               throw $erro;
            } 

        }

    }

?>
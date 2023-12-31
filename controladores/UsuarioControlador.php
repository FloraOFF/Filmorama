<?php
    require_once "../conexao/Conexao.php";
    require_once "../modelos/Usuario.php";

    class UsuarioControlador{

        private $conn;

        public function salvar($usuario){

            try {
        
                $conexao = new Conexao();
                $conn = $conexao->getConexao();               
                $usuario->salvar($conn);
        
                echo "New record created successfully";
            } catch(PDOException $e) {
                echo "<br>" . $e->getMessage();
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
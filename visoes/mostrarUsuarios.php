<?php

    require_once "../conexao/Conexao.php";
    require_once "../modelos/Usuario.php";

    try {
        
        $conexao = new Conexao();
        $conn = $conexao->getConexao();
       
        $usuario = new Usuario();
        //var_dump($usuario);
        $listaUsuarios = $usuario->buscarTodos($conn);
       // var_dump($listaUsuarios);
        foreach($listaUsuarios as $usuario){
            echo  "id: " . $usuario->getId();
            echo  "<br>nome: " .  $usuario->getNome(); 
            echo  "<br>email: " . $usuario->getEmail();
            echo  "<br>telefone: " . $usuario->getTelefone();
            echo  "<br>senha: " . $usuario->getSenha();      
            echo "<br><br>";
        }


    } catch(PDOException $e) {

    }

?>
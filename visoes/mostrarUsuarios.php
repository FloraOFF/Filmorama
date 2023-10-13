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
            echo  "nome: " .  $usuario->getNome(); 
            echo  "email: " . $usuario->getEmail();
            echo  "telefone: " . $usuario->getTelefone();
            echo  "senha:" . $usuario->getSenha();      
            echo "<br>";
        }


    } catch(PDOException $e) {

    }

?>
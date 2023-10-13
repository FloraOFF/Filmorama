<?php
    require_once "../conexao/Conexao.php";
    require_once "../excecoes/AutenticarException.php";
    require_once "../modelos/Usuario.php";

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $conexao = new Conexao();
    $conn = $conexao->getConexao();

    $usuario = new Usuario();
    $usuario->setEmail($email);
    $usuario->setSenha($senha);
    
    try{
        $usuario = $usuario->autenticar($conn);
        $nome = $usuario->getNome();

        session_start();
        $_SESSION['usuario'] = $usuario;

        header('Location: ../visoes/home.php'); 
    }catch(AutenticarException $erro){
        echo $erro->getMessage();
        header('Location: ../visoes/formAutenticar.html'); 
    } 
    

?>
<?php

    require_once "../modelos/Usuario.php";
    require_once "../modelos/Endereco.php";
    require_once "UsuarioControlador.php";

    $acao = $_GET['acao'];

    switch ($acao){
        case "salvarUsuario":
                $nome = $_POST['nome'];
                $telefone = $_POST['telefone'];
                $email = $_POST['email'];
                $senha = $_POST['senha'];
                $rua = $_POST['rua'];
                $numero = $_POST['numero'];
                $cep = $_POST['cep'];
                $cidade = $_POST['cidade'];

                $usuario = new Usuario();
                $usuario->setNome($nome);
                $usuario->setEmail($email);
                $usuario->setSenha($senha);
                $usuario->setTelefone($telefone);

                $endereco = new Endereco($rua,$numero,$cep,$cidade);
                $usuario->setEndereco($endereco);

               $usuarioControlador = new UsuarioControlador();
               $usuarioControlador->salvar($usuario);
               //header('Location: salvarUsuario.php'); 
            break;
        case "autenticar":
                $email = $_POST['email'];
                $senha = $_POST['senha'];
            
                $usuario = new Usuario();
                $usuario->setEmail($email);
                $usuario->setSenha($senha);
                
                try{

                    $usuarioControlador = new UsuarioControlador();
                    $usuario = $usuarioControlador->autenticar($usuario);

                    session_start();
                    $_SESSION['usuario'] = $usuario;
            
                    header('Location: ../visoes/home.php'); 

                }catch(AutenticarException $erro){
                    echo $erro->getMessage();
                    header('Location: ../visoes/formAutenticar.html'); 
                } 
            break;
    }

  

?>
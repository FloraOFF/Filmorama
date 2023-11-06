<?php

    require_once "../modelos/Usuario.php";
    require_once "../modelos/Filme.php";
    require_once "UsuarioControlador.php";
    require_once "FilmeControlador.php";

    $acao = $_GET['acao'];

    switch ($acao){
        case "salvarUsuario":
                $nome = $_POST['nome'];
                $telefone = $_POST['telefone'];
                $email = $_POST['email'];
                $senha = $_POST['senha'];

                $usuario = new Usuario();
                $usuario->setNome($nome);
                $usuario->setEmail($email);
                $usuario->setSenha($senha);
                $usuario->setTelefone($telefone);

               $usuarioControlador = new UsuarioControlador();
               $usuarioControlador->salvar($usuario);
               header('../visoes/mostrarUsuarios.html'); 
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
        case "salvarFilme":
                $titulo = $_POST['titulo'];
                $dataEstreia = $_POST['dataEstreia'];
                $genero = $_POST['genero'];
                $classificacao = $_POST['classificacao'];
                $duracao = $_POST['duracao'];
                $elenco = $_POST['elenco'];
                $sinopse = $_POST['sinopse'];
                $avaliacao = $_POST['avaliacao'];
                $produtora = $_POST['produtora'];
                $paisOrigem = $_POST['paisOrigem'];
                $idioma = $_POST['idioma'];
               
                $filme = new Filme();
                $filme->setTitulo($titulo);
                $filme->setDataEstreia($dataEstreia);
                $filme->setGenero($genero);
                $filme->setClassificacao($classificacao);
                $filme->setDuracao($duracao);
                $filme->setElenco($elenco);
                $filme->setSinopse($sinopse);
                $filme->setAvaliacao($avaliacao);
                $filme->setProdutora($produtora);
                $filme->setPaisOrigem($paisOrigem);
                $filme->setIdioma($idioma);

                $filmeControlador = new FilmeControlador();
                $filmeControlador->salvar($filme);
                header('Location: ../visoes/mostrarFilmes.php'); 
            break;
        case "mostrarFilmes": 
                $filmeController = new FilmeControlador();
                $filmes = $filmeController->buscarTodos();

                //var_dump($filme);
                //echo "<br>";
                //var_dump($filmes);
                header('Content-Type: application/json');
                echo json_encode($filmes, JSON_UNESCAPED_UNICODE);

            break;
    }   
?>
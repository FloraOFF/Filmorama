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
                $papel = "Comum";

                $usuario = new Usuario();
                $usuario->setNome($nome);
                $usuario->setEmail($email);
                $usuario->setSenha($senha);
                $usuario->setTelefone($telefone);
                $usuario->setPapel($papel);

               $usuarioControlador = new UsuarioControlador();
               $usuarioControlador->salvar($usuario);
               header('Location: ../index.html'); 
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
            
                    header('Location: ../visoes/home.html'); 

                }catch(AutenticarException $erro){
                    echo $erro->getMessage();
                    header('Location: ../visoes/formAutenticar.html'); 
                } 

            break;
        case "salvarFilme":
                $id = $_POST['idFilme'];
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

                if (!empty($id)) {
                    $filme->setId($id);
                }
                
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
                header('Location: ../visoes/mostrarFilmes.html'); 
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
        case "deletarFilme": 
            $idFilme = $_GET['idFilme'];
            $filmeController = new FilmeControlador();
            $filmes = $filmeController->delete($idFilme);

            //var_dump($filme);
            //echo "<br>";
            //var_dump($filmes);
            header('Location: ../visoes/mostrarFilmes.html'); 
            break;
        case "User": 
            session_start();
            if (isset($_SESSION['usuario'])) {
                $usuario = new Usuario();
                $usuario = $_SESSION['usuario'];

                header('Content-Type: application/json');
                echo json_encode($usuario);
            } else {
                header('Content-Type: application/json');
                echo json_encode(null);
            }
            break;
        case "Logout":
            session_start();
            session_unset();
            session_destroy();
            header('HTTP/1.1 200 OK');
            break;
    }   
?>
<?php

    require_once "../conexao/Conexao.php";
    require_once "../modelos/Filme.php";

    try {
        
        $conexao = new Conexao();
        $conn = $conexao->getConexao();
       
        $filme = new Filme();
        //var_dump($filme);
        $listaFilmes = $filme->buscarTodos($conn);
       // var_dump($listaUsuarios);
        foreach($listaFilmes as $filme){
            echo  "<br>id: " . $filme->getId();
            echo  "<br>titulo: " . $filme->getTitulo();
            echo  "<br>data estreia: " . $filme->getDataEstreia();
            echo  "<br>genero: " .$filme->getGenero();
            echo  "<br>classificacao: " .$filme->getClassificacao();
            echo  "<br>duracao: " . $filme->getDuracao();
            echo  "<br>elenco: " . $filme->getElenco();
            echo  "<br>sinopse: " . $filme->getSinopse();
            echo  "<br>avaliacao: " . $filme->getAvaliacao();
            echo  "<br>produtora: " . $filme->getProdutora();
            echo  "<br>pais origem: " . $filme->getPaisOrigem();
            echo  "<br>idioma: " . $filme->getIdioma();
            echo "<br><br>";
        }


    } catch(PDOException $e) {

    }

?>
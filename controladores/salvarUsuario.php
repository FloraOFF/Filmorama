<?php

    require_once "../conexao/Conexao.php";
    require_once "../modelos/Usuario.php";
    require_once "../modelos/Endereco.php";

    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $cep = $_POST['cep'];
    $cidade = $_POST['cidade'];
    try {

        $conexao = new Conexao();
        $conn = $conexao->getConexao();
       
        $conn->beginTransaction();

        $usuario = new Usuario();
        $usuario->setNome($nome);
        $usuario->setEmail($email);
        $usuario->setSenha($senha);
        $usuario->setTelefone($telefone);
        $usuario->salvar($conn);
        
        $endereco = new Endereco($rua,$numero,$cep,$cidade,$usuario);
        $endereco->salvar($conn);

        $conn->commit();

        echo "New record created successfully";
    } catch(PDOException $e) {
        echo "<br>" . $e->getMessage();
        $conn->rollback();
    }

?>
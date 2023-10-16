<?php
    require_once "../modelos/Usuario.php";
    session_start();

    if($_SESSION['usuario'] == null){
        header('Location: formAutenticar.html'); 
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem vindo</title>
</head>
<body>
    <h1>Bem vindo 
        <?php  $usuario = $_SESSION['usuario']; 
            echo $usuario->getEmail();
        ?>

        <div id="actionsUser">
            <h3>O que deseja fazer?</h3>
            <a href="formCadastrarFilme.html">Cadastrar Filme</a>
        </div>
    </h1>
</body>
</html>
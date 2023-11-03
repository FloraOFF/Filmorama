<?php

require_once "../excecoes/AutenticarException.php";

class Usuario {
    private $id;
    private $nome;
    private $telefone;
    private $email;
    private $senha;

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }

    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email = $email;
    }

    public function getTelefone(){
        return $this->telefone;
    }
    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }

    public function getSenha(){
        return $this->senha;
    }
    public function setSenha($senha){
        $this->senha = $senha;
    }
   
    public function autenticar($conn){
        $sql = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $this->email);
        $stmt->execute();
        $usuarioDoBanco = $stmt->fetch(PDO::FETCH_OBJ);
        var_dump($usuarioDoBanco);
        if ($usuarioDoBanco && password_verify($this->senha, $usuarioDoBanco->senha)) {
            $this->senha = $usuarioDoBanco->senha;
            $this->nome = $usuarioDoBanco->nome;
            $this->telefone = $usuarioDoBanco->telefone;
            $this->id = $usuarioDoBanco->id;
            return $this;
        }else{
            throw new AutenticarException("Usuario ou senha errado");
        }
    }

    public function salvar($conn){

        $sql = "INSERT INTO usuarios (nome, telefone, email,senha)
        VALUES (?, ?, ?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $this->nome);
        $stmt->bindParam(2, $this->telefone);
        $stmt->bindParam(3, $this->email);
        $hash = password_hash($this->senha,PASSWORD_DEFAULT);
        $stmt->bindParam(4, $hash);
        $stmt->execute();
        $this->id = $conn->lastInsertId();
        //return $this;
    }

    public function buscarTodos($conn){
        
        $sql = "SELECT * FROM usuarios";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $listaUsuarios = array();
        while ($usuarioDoBanco = $stmt->fetch(PDO::FETCH_OBJ)){ //está pegando a linha e transformando em um objeto
            $usuario = new Usuario();
            $usuario->setId($usuarioDoBanco->id);
            $usuario->setNome($usuarioDoBanco->nome);
            $usuario->setEmail($usuarioDoBanco->email);
            $usuario->setSenha($usuarioDoBanco->senha);
            $usuario->setTelefone($usuarioDoBanco->telefone);

            array_push($listaUsuarios,$usuario);
        }
        return  $listaUsuarios;
   }
    
}

?>
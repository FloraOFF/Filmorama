<?php

class Endereco{

    private $id;
    private $rua;
    private $numero;
    private $cep;
    private $cidade;


    function __construct($rua,$numero,$cep,$cidade){
        $this->rua = $rua;
        $this->numero = $numero;
        $this->cep = $cep;
        $this->cidade = $cidade;
    }

    public function salvar($conn){

        $sql = "INSERT INTO enderecos (rua, numero, cep,cidade,id_usuario)
        VALUES (?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $this->rua);
        $stmt->bindParam(2, $this->numero);
        $stmt->bindParam(3, $this->cep);
        $stmt->bindParam(4, $this->cidade);
        $stmt->bindParam(5, $this->idUsuario);   
        $stmt->execute();
    }


    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }

    public function getIdUsuario(){
        return $this->idUsuario;
    }
    public function setIdUsuario($idUsuario){
        $this->idUsuario = $idUsuario;
    }

}

?>
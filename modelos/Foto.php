<?php

    class Foto{

        private $id;
        private $nome;
        private $conteudo;
        private $filme;

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
        
           public function getConteudo(){
            return $this->conteudo;
           }
           public function setConteudo($conteudo){
            $this->conteudo = $conteudo;
           }

           public function getAnuncio(){
            return $this->anuncio;
           }
           public function setAnuncio($anuncio){
            $this->anuncio = $anuncio;
           }
    
           public function salvar($conn){

            $sql = "INSERT INTO Fotos (nome, conteudo,id_anuncio)
            VALUES (?, ?,?)";
            $stmt = $conn->prepare($sql);
           
            $stmt->bindParam(1, $this->nome);
            $stmt->bindParam(2, $this->conteudo);
            //$stmt->bindParam(3, $this->tamanho);
            $stmt->bindValue(3, $this->anuncio->getId());

            $stmt->execute();
        }

        public function buscarFotosPeloIdFilme($conn,$id_filme){
           
            $sql = "SELECT * FROM Fotos WHERE id_filme = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, $id_filme);
            $stmt->execute();
    
            $listaFotos = array();
            while ($fotoDoBanco = $stmt->fetch(PDO::FETCH_OBJ)){ //está pegando a linha e transformando em um objeto
                $foto = new Foto();
                $foto->setId($fotoDoBanco->id);
                $foto->setNome($fotoDoBanco->nome);
                $foto->setConteudo(base64_encode($fotoDoBanco->conteudo));
                
                array_push($listaFotos,$foto);          
            }
            return  $listaFotos;
        }


    }

?>
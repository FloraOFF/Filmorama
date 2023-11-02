<?php
    class Filme {
        private $id;
        private $titulo;
        private $dataEstreia;
        private $genero;
        private $classificacao;
        private $duracao;
        private $elenco;
        private $sinopse;
        private $avaliacao;
        private $produtora;
        private $paisOrigem;
        private $idioma;

        public function getId() {
            return $this->id;
        }
        public function setId($id) {
            $this->id = $id;
        }

        public function getTitulo() {
            return $this->titulo;
        }
        public function setTitulo($titulo) {
            $this->titulo = $titulo;
        }
    
        public function getDataEstreia() {
            return $this->dataEstreia;
        }
        public function setDataEstreia($dataEstreia) {
            $this->dataEstreia = $dataEstreia;
        }
    
        public function getGenero() {
            return $this->genero;
        }
        public function setGenero($genero) {
            $this->genero = $genero;
        }
    
        public function getClassificacao() {
            return $this->classificacao;
        }
        public function setClassificacao($classificacao) {
            $this->classificacao = $classificacao;
        }
    
        public function getDuracao() {
            return $this->duracao;
        }
        public function setDuracao($duracao) {
            $this->duracao = $duracao;
        }
    
        public function getElenco() {
            return $this->elenco;
        }
        public function setElenco($elenco) {
            $this->elenco = $elenco;
        }
    
        public function getSinopse() {
            return $this->sinopse;
        }
        public function setSinopse($sinopse) {
            $this->sinopse = $sinopse;
        }
    
        public function getAvaliacao() {
            return $this->avaliacao;
        }
        public function setAvaliacao($avaliacao) {
            $this->avaliacao = $avaliacao;
        }
    
        public function getProdutora() {
            return $this->produtora;
        }
        public function setProdutora($produtora) {
            $this->produtora = $produtora;
        }
    
        public function getPaisOrigem() {
            return $this->paisOrigem;
        }
        public function setPaisOrigem($paisOrigem) {
            $this->paisOrigem = $paisOrigem;
        }
    
        public function getIdioma() {
            return $this->idioma;
        }
        public function setIdioma($idioma) {
            $this->idioma = $idioma;
        }

        public function salvar($conn){

            $sql = "INSERT INTO filmes (titulo, dataEstreia, genero, classificacao, duracao, elenco, sinopse, avaliacao, produtora, paisOrigem, idioma)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $this->titulo);
            $stmt->bindParam(2, $this->dataEstreia);
            $stmt->bindParam(3, $this->genero);
            $stmt->bindParam(4, $this->classificacao);
            $stmt->bindParam(5, $this->duracao);
            $stmt->bindParam(6, $this->elenco);
            $stmt->bindParam(7, $this->sinopse);
            $stmt->bindParam(8, $this->avaliacao);
            $stmt->bindParam(9, $this->produtora);
            $stmt->bindParam(10, $this->paisOrigem);
            $stmt->bindParam(11, $this->idioma);
            $stmt->execute();
            $this->id = $conn->lastInsertId();
            //return $this;
        }

        public function buscarTodos($conn){
        
            $sql = "SELECT * FROM filmes";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
    
            $listaFilmes = array();
            while ($filmeDoBanco = $stmt->fetch(PDO::FETCH_OBJ)){ //está pegando a linha e transformando em um objeto
                $filme = new Filme();
                $filme->setId($filmeDoBanco->id);
                $filme->setTitulo(utf8_encode($filmeDoBanco->titulo));
                $filme->setDataEstreia(utf8_encode($filmeDoBanco->dataEstreia));
                $filme->setGenero(utf8_encode($filmeDoBanco->genero));
                $filme->setClassificacao(utf8_encode($filmeDoBanco->classificacao));
                $filme->setDuracao(utf8_encode($filmeDoBanco->duracao));
                $filme->setElenco(utf8_encode($filmeDoBanco->elenco));
                $filme->setSinopse(utf8_encode($filmeDoBanco->sinopse));
                $filme->setAvaliacao(utf8_encode($filmeDoBanco->avaliacao));
                $filme->setProdutora(utf8_encode($filmeDoBanco->produtora));
                $filme->setPaisOrigem(utf8_encode($filmeDoBanco->paisOrigem));
                $filme->setIdioma(utf8_encode($filmeDoBanco->idioma));
    
                array_push($listaFilmes,$filme);
            }
            return  $listaFilmes;
       }

    }
?>
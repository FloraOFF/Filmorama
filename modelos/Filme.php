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

    }
?>
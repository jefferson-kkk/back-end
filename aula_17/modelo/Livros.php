<?php

class Livros {
    private $titulo;
    private $autor;
    private $ano_publicacao;
    private $genero;
    private $qntd_disponivel;

    public function __construct($titulo, $autor, $ano_publicacao, $genero, $qntd_disponivel){
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->ano_publicacao = $ano_publicacao;
        $this->genero = $genero;
        $this->qntd_disponivel = $qntd_disponivel;
    }

    // getters
    public function getTitulo(){
        return $this->titulo;
    }
    public function getAutor(){
        return $this->autor;
    }
    public function getAno_Publicacao(){
        return $this->ano_publicacao;
    }
    public function getGenero(){
        return $this->genero;
    }
    public function getQntd_Disponivel(){
        return $this->qntd_disponivel;
    }

    // setters
    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }
    public function setAutor($autor){
        $this->autor = $autor;
    }
    public function setAno_Publicacao($ano_publicacao){
        $this->ano_publicacao = $ano_publicacao;
    }
    public function setGenero($genero){
        $this->genero = $genero;
    }
    public function setQntd_Disponivel($qntd_disponivel){
        $this->qntd_disponivel = $qntd_disponivel;
    }
}
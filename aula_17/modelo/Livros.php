<?php

class livros {
    private $titulo;
    private $autor;
    private $ano_publicacao;
    private $genero;
    private $qntd_disponivel;

    public function __construct($titulo, $autor, $ano_publicacao, $genero, $qntd_disponivel){
        $this-> titulo = $titulo;
        $this-> autor = $autor;
        $this-> ano_publicacao = $ano_publicacao;
        $this-> genero = $genero;
        $this-> qntd_disponivel = $qntd_disponivel;
        
    }
    // getters
    public function Gettitulo(){
        return $this->titulo;
    }
    public function Getautor(){
        return $this->autor;
    }
    public function Getano_publicacao(){
        return $this->ano_publicacao;
    }
    public function Getgenero(){
        return $this-> genero;
    }
    public function Getqntd_disponivel(){
        return $this-> qntd_disponivel;
    }

    // setters
    public function Settitulo($titulo){
        return $this->titulo;
    }
    public function Setautor($autor){
        return $this->autor;
    }
    public function Setano_publicacao($ano_publicacao){
        return $this->ano_publicacao;
    }
    public function Setgenero($genero){
        return $this-> genero;
    }
    public function Setqntd_disponivel($qntd_disponivel){
        return $this-> qntd_disponivel;

    }
}
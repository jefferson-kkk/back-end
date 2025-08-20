<?php
class cachorro {
    public $nome;
    public $idade;
    public $raca;
    public $castrado;
    public $sexo;

    public function __construct($nome, $idade, $raca, $castrado, $sexo
    ) {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->raca = $raca;
        $this->castrado = $castrado;
        $this->sexo = $sexo;
    }
}
$dog1 = new cachorro("Max", 5, "Labrador", true, "M");
$dog2 = new cachorro("Bella", 3, "Poodle", false, "F");
$dog3 = new cachorro("Thor", 2, "Bulldog", true, "M");
$dog4 = new cachorro("Mel", 4, "Shih Tzu", false, "F");
$dog5 = new cachorro("Luke", 6, "Golden Retriever", true, "M");
$dog6 = new cachorro("Luna", 1, "Beagle", false, "F");
$dog7 = new cachorro("Bob", 7, "Dachshund", true, "M");
$dog8 = new cachorro("Nina", 2, "Yorkshire", false, "F");
$dog9 = new cachorro("Toby", 8, "Pastor Alemão", true, "M");
$dog10 = new cachorro("Maggie", 5, "Boxer", false, "F");
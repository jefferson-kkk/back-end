<?php
// ===============================================
// CENÁRIO 1 - VIAGEM PELO MUNDO
// ===============================================
// Um grupo de turistas vai visitar o Japão, o Brasil e o Acre.
// Em cada lugar da Terra, eles poderão comer comidas típicas e nadar em rios ou praias.

// ----------- Classes identificadas ---------------
// Substantivos: Turista, Lugar, Comida, CorpoDagua
// Verbos: viajar, comer, nadar
// -------------------------------------------------

class Turista {
    public $cpf;
    public $nome;
    public $email;
    public $localAtual;

    function __construct($nome, $cpf, $email) {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->email = $email;
    }

    function viajar($lugar) {
        $this->localAtual = $lugar->nome;
        echo "<p>{$this->nome} viajou para {$lugar->nome} ({$lugar->pais}).</p>";
    }

    function comer(Comida $comida) {
        echo "<p>{$this->nome} está saboreando {$comida->nome}, um prato {$comida->tipo}.</p>";
    }

    function nadar(CorpoDagua $agua) {
        echo "<p>{$this->nome} foi nadar em um(a) {$agua->tipo} chamado(a) {$agua->nome}.</p>";
    }
}

class Lugar {
    public $nome;
    public $pais;
    public $continente;

    function __construct($nome, $pais, $continente) {
        $this->nome = $nome;
        $this->pais = $pais;
        $this->continente = $continente;
    }

    function descreverLugar() {
        echo "<p>{$this->nome} está localizado em {$this->pais}, no continente {$this->continente}.</p>";
    }
}

class Comida {
    public $nome;
    public $tipo;

    function __construct($nome, $tipo) {
        $this->nome = $nome;
        $this->tipo = $tipo;
    }

    function mostrarComida() {
        echo "<p>Comida típica: {$this->nome} ({$this->tipo})</p>";
    }
}

class CorpoDagua {
    public $nome;
    public $tipo; // rio ou praia

    function __construct($nome, $tipo) {
        $this->nome = $nome;
        $this->tipo = $tipo;
    }

    function descreverAgua() {
        echo "<p>Local para nadar: {$this->nome}, que é um(a) {$this->tipo}.</p>";
    }

    function mergulhar($pessoa) {
        echo "<p>{$pessoa->nome} mergulhou nas águas de {$this->nome}!</p>";
    }
}

// ===============================================
// EXEMPLO DE EXECUÇÃO
// ===============================================

// Lugares
$japao = new Lugar("Tóquio", "Japão", "Ásia");
$brasil = new Lugar("Rio de Janeiro", "Brasil", "América do Sul");
$acre = new Lugar("Rio Branco", "Brasil", "América do Sul");

// Comidas
$sushi = new Comida("Sushi", "japonesa");
$feijoada = new Comida("Feijoada", "brasileira");
$tacaca = new Comida("Tacacá", "regional do Acre");

// Corpos d'água
$praiaCopacabana = new CorpoDagua("Copacabana", "praia");
$rioAcre = new CorpoDagua("Rio Acre", "rio");

// Turistas
$turista1 = new Turista("Maria", "12345678900", "maria@gmail.com");
$turista2 = new Turista("Carlos", "98765432100", "carlos@hotmail.com");

// Viagens e experiências
$japao->descreverLugar();
$turista1->viajar($japao);
$turista1->comer($sushi
);
$turista1->nadar($praiaCopacabana);
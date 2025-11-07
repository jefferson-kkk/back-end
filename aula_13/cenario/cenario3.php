<?php
// ======================================================
// CENÁRIO 3 – Fantasia e Destino
// ======================================================

// Substantivos (classes): Personagem, Jornada, Clima, Refeicao
// Verbos (métodos): amar(), celebrar(), iniciarJornada(), chover(), servir()

class Personagem {
    public $nome;
    public $energia = 100;
    public $emoções = [];

    function __construct($nome) { $this->nome = $nome; }

    function amar(Personagem $outro) {
        $this->emoções[] = "Amou {$outro->nome}";
        echo "{$this->nome} demonstrou amor por {$outro->nome}.<br>";
    }

    function celebrar() { echo "{$this->nome} está celebrando a vitória!<br>"; }
    function receberChuva() { $this->energia -= 10; echo "{$this->nome} foi molhado. Energia: {$this->energia}<br>"; }
}

class Jornada {
    public $participantes = [];

    function adicionar(Personagem $p) { $this->participantes[] = $p; }
    function iniciar() { echo "A jornada começou com "; foreach($this->participantes as $p) echo "{$p->nome} "; echo "!<br>"; }
}

class Clima {
    public $estado;
    function __construct($estado) { $this->estado = $estado; }
    function chover($personagens) {
        echo "Começou a chover!<br>";
        foreach ($personagens as $p) { $p->receberChuva(); }
    }
}

class Refeicao {
    public $comida;
    function __construct($comida) { $this->comida = $comida; }
    function servir($personagens) {
        echo "Servindo {$this->comida} para todos:<br>";
        foreach ($personagens as $p) echo "- {$p->nome} comeu {$this->comida}<br>";
    }
}

// Criando personagens
$john = new Personagem("John Snow");
$smurf = new Personagem("Papai Smurf");
$deadpool = new Personagem("Deadpool");
$dexter = new Personagem("Dexter");

// Criando jornada
$jornada = new Jornada();
$jornada->adicionar($john);
$jornada->adicionar($smurf);
$jornada->adicionar($deadpool);
$jornada->adicionar($dexter);

// Início da jornada
$jornada->iniciar();

// Clima
$chuva = new Clima("Chuva");
$chuva->chover([$john,$smurf,$deadpool,$dexter]);

// Interações de amor
$john->amar($smurf);
$deadpool->amar($dexter);
$smurf->amar($john);
$dexter->amar($deadpool);

// Refeição final
$banquete = new Refeicao("Banquete Mágico");
$banquete->servir([$john,$smurf,$deadpool,$dexter]);

// Celebração
$john->celebrar();
$smurf->celebrar();
$deadpool->celebrar();
$dexter->celebrar();
?>

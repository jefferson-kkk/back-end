<?php
// ======================================================
// CENÁRIO 6 – Sistema de Cinema
// ======================================================

// Substantivos: Cliente, Filme, Sessao, Cinema
// Verbos: comprarIngresso(), escolherFilme(), exibirSessao()

class Cliente {
    public $nome;
    public $ingressos = [];

    function __construct($nome) { $this->nome = $nome; }

    function comprarIngresso($sessao) {
        $this->ingressos[] = $sessao;
        echo "{$this->nome} comprou ingresso para {$sessao->filme->titulo} às {$sessao->horario}.<br>";
    }
}

class Filme {
    public $titulo;
    public $genero;

    function __construct($titulo, $genero) {
        $this->titulo = $titulo;
        $this->genero = $genero;
    }
}

class Sessao {
    public $filme;
    public $horario;

    function __construct($filme, $horario) {
        $this->filme = $filme;
        $this->horario = $horario;
    }

    function exibirSessao() {
        echo "Sessão de {$this->filme->titulo} às {$this->horario}.<br>";
    }
}

class Cinema {
    public $nome;
    public $sessoes = [];

    function __construct($nome) { $this->nome = $nome; }

    function adicionarSessao(Sessao $sessao) {
        $this->sessoes[] = $sessao;
        echo "Sessão de {$sessao->filme->titulo} adicionada ao cinema {$this->nome}.<br>";
    }
}

// ================== SIMULAÇÃO ==================
$filme1 = new Filme("Vingadores", "Ação");
$filme2 = new Filme("Encanto", "Animação");

$sessao1 = new Sessao($filme1, "19:30");
$sessao2 = new Sessao($filme2, "17:00");

$cinema = new Cinema("CineLimeira");
$cinema->adicionarSessao($sessao1);
$cinema->adicionarSessao($sessao2);

$cliente1 = new Cliente("João");
$cliente2 = new Cliente("Maria");

$cliente1->comprarIngresso($sessao1);
$cliente2->comprarIngresso($sessao2);

$sessao1->exibirSessao();
$sessao2->exibirSessao();
?>

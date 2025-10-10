<?php
// ======================================================
// CENÁRIO 2 – Heróis e Personagens
// ======================================================
//
// O Batman, o Superman e o Homem-Aranha estão em uma missão.
// Eles precisam fazer treinamentos especiais no Cotil e,
// depois, irão ao shopping para doar brinquedos às crianças.
//
// ------------------------------------------------------
// ANÁLISE DE LINGUAGEM NATURAL
// ------------------------------------------------------
// Substantivos (objetos/classes possíveis):
// - Heroi
// - Missao
// - Local (Cotil, Shopping)
// - Crianca
// - Brinquedo
//
// Verbos (métodos possíveis):
// - treinar()
// - doar()
// - irParaMissao()
// - descansar()

class Heroi {
    public $nome;
    public $poder;
    public $nivelTreinamento = 0;
    public $brinquedos = [];

 
    function __construct($nome, $poder) {
        $this->nome = $nome;
        $this->poder = $poder;
        echo "Herói {$this->nome} com poder de {$this->poder} foi criado!<br>";
    }

    function irParaMissao($missao) {
        echo "{$this->nome} está iniciando a missão: {$missao->descricao}<br>";
        $missao->adicionarHeroi($this);
    }

    function treinar($local) {
        $this->nivelTreinamento += 10;
        echo "{$this->nome} está treinando no {$local->nome}. Nível de treinamento atual: {$this->nivelTreinamento}<br>";
    }

    function doarBrinquedo($crianca, $brinquedo) {
        echo "{$this->nome} doou um {$brinquedo->nome} para {$crianca->nome}.<br>";
        $crianca->receberBrinquedo($brinquedo);
    }

    function descansar($local) {
        echo "{$this->nome} está descansando no {$local->nome}.<br>";
    }

    function mostrarStatus() {
        echo "<br>Status de {$this->nome}:<br>";
        echo "- Poder: {$this->poder}<br>";
        echo "- Nível de Treinamento: {$this->nivelTreinamento}<br><br>";
    }
}


class Missao {
    public $descricao;
    public $herois = [];

    function __construct($descricao) {
        $this->descricao = $descricao;
    }

    function adicionarHeroi($heroi) {
        $this->herois[] = $heroi->nome;
    }

    function exibirParticipantes() {
        echo "<br>Heróis na missão '{$this->descricao}':<br>";
        foreach ($this->herois as $nomeHeroi) {
            echo "- {$nomeHeroi}<br>";
        }
    }
}

class Local {
    public $nome;
    public $tipo;

    function __construct($nome, $tipo) {
        $this->nome = $nome;
        $this->tipo = $tipo;
    }

    function exibirInfo() {
        echo "Local: {$this->nome} ({$this->tipo})<br>";
    }
}

class Brinquedo {
    public $nome;
    public $tipo;

    function __construct($nome, $tipo) {
        $this->nome = $nome;
        $this->tipo = $tipo;
    }

    function exibirBrinquedo() {
        echo "Brinquedo: {$this->nome} ({$this->tipo})<br>";
    }
}

class Crianca {
    public $nome;
    public $idade;
    public $brinquedosRecebidos = [];

    function __construct($nome, $idade) {
        $this->nome = $nome;
        $this->idade = $idade;
    }

    function receberBrinquedo($brinquedo) {
        $this->brinquedosRecebidos[] = $brinquedo->nome;
    }

    function listarBrinquedos() {
        echo "Brinquedos recebidos por {$this->nome}:<br>";
        foreach ($this->brinquedosRecebidos as $b) {
            echo "- {$b}<br>";
        }
    }
}



// Locais
$cotil = new Local("Cotil", "Instituição de Ensino");
$shopping = new Local("Shopping Center", "Comércio");

// Missão
$missao = new Missao("Treinar no Cotil e doar brinquedos no Shopping");

// Heróis
$batman = new Heroi("Batman", "Inteligência e tecnologia");
$superman = new Heroi("Superman", "Superforça e voo");
$homemAranha = new Heroi("Homem-Aranha", "Agilidade e teias");

// Brinquedos
$bola = new Brinquedo("Bola", "Esporte");
$carrinho = new Brinquedo("Carrinho", "Diversão");
$boneco = new Brinquedo("Boneco", "Colecionável");

// Crianças
$crianca1 = new Crianca("Lucas", 8);
$crianca2 = new Crianca("Maria", 7);

// Início da missão
echo "<br>===== MISSÃO COMEÇA =====<br><br>";

$batman->irParaMissao($missao);
$superman->irParaMissao($missao);
$homemAranha->irParaMissao($missao);

// Treinamentos
$batman->treinar($cotil);
$superman->treinar($cotil);
$homemAranha->treinar($cotil);

// Doações no shopping
$batman->doarBrinquedo($crianca1, $carrinho);
$superman->doarBrinquedo($crianca2, $boneco);
$homemAranha->doarBrinquedo($crianca1, $bola);

// Descanso
$batman->descansar($shopping);
$superman->descansar($shopping);
$homemAranha->descansar($shopping);

echo "<br>===== MISSÃO CONCLUÍDA =====<br><br>";

// Relatórios
$missao->exibirParticipantes();
$batman->mostrarStatus();
$superman->mostrarStatus();
$homemAranha->mostrarStatus();

$crianca1->listarBrinquedos();
$crianca2->listarBrinquedos();

?>

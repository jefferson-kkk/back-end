<?php
namespace Aula_11;

interface Atualizado {
    public function JogoAtualizado();
}

interface Instalado{
    public function JogoInstalado();
}

class jogos implements Atualizado, Instalado{
    private $nome;  
    private $categoria; 
    private $ano;
    private $criador;

    // Criando construtor para a classe Jogos
    public function __construct($nome, $categoria, $ano, $criador) {
        $this->setNome($nome);
        $this->setCategoria($categoria);
        $this->setAno($ano);    
        $this->setCriador($criador);
    }

    // Setter e Getter do $nome
    public function setNome($nome) {        
        $this->nome = ucwords(strtolower($nome));
    }
    public function getNome() {        
        return $this->nome;
    }

    // Setter e Getter do $categoria
    public function setCategoria($categoria) {        
        $this->categoria = ucwords(strtolower($categoria));
    }
    public function getCategoria() {        
        return $this->categoria;
    }

     // Setter e Getter do $ano
    public function setAno($ano) {        
        $this->ano = abs((int)$ano); 
    }
    public function getAno() {        
        return $this->ano;
    }

    // Setter e Getter do $criador
    public function setCriador($criador) {        
        $this->criador = ucwords(strtolower($criador));
    }
    public function getCriador() {        
        return $this->criador;
    }

    // Métodos das interfaces
    public function JogoAtualizado() {
        return "O jogo está atualizado.";
    }
    public function JogoInstalado(){
        return "O jogo está instalado.";
    }

    // Método para exibir informações
    public function exibirInfo() {
        return "  Nome do jogo: " . $this->getNome() . 
               "\n  Categoria: " . $this->getCategoria() . 
               "\n  Ano: " . $this->getAno() . 
               "\n  Criador: " . $this->getCriador() . "\n";
    }
}


// ===============================================
//           CLASSE FILHA: JOGADOR
// ===============================================
class Jogador extends jogos {
    private $nickname;
    private $level;

    // Construtor da classe filha
    public function _construct($nome, $categoria, $ano, $criador, $nickname, $level) {
        $this->setNickname($nickname);
        $this->setLevel($level);
    }

    // Setter e Getter do $nickname
    public function setNickname($nickname) {
        $this->nickname = $nickname;
    }
    public function getNickname() {
        return $this->nickname;
    }

    // Setter e Getter do $level
    public function setLevel($level) {
        $this->level = abs((int)$level);
    }
    public function getLevel() {
        return $this->level;
    }

    // Sobrescrevendo o método para exibir informações do jogo e do jogador
    public function exibirInfo() {
        // Pega as informações do método pai e adiciona as novas
        return 
               "  Nickname do Jogador: " . $this->getNickname() . 
               "\n  Level: " . $this->getLevel() . "\n\n";
    }
}


$jogo1 = new jogos("Fortnite","Battle Royale", "2017", "Epic Games");
$jogo2 = new jogos("Valorant","FPS", "2020", "Riot");
$jogo3 = new jogos("Need For Speed", "Corrida", "2022", "Criterion Games");

// Exibindo as informações dos jogos
echo "Jogo 1:\n" . $jogo1->exibirInfo() . "\n";
echo "Jogo 2:\n" . $jogo2->exibirInfo() . "\n";
echo "Jogo 3:\n" . $jogo3->exibirInfo() . "\n";


$jogador1 = new Jogador("Fortnite", "Battle Royale", "2017", "Epic Games", "Ninja", 150);
$jogador2 = new Jogador("Valorant", "FPS", "2020", "Riot", "Tenz", 230);


echo "Jogador 1:\n" . $jogador1->exibirInfo();
echo "Jogador 2:\n" . $jogador2->exibirInfo();


echo $jogador1->JogoInstalado() . "\n";
echo $jogador2->JogoAtualizado() . "\n";

?>
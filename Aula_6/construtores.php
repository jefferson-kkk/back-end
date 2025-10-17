<?php
class produtos {

    public $nome;
    public $categoria;
    public $fornecedor;
    public $qtde_estoque;

    public function __construct($nome, $categoria, $fornecedor, $qtde_estoque) {
        $this->nome = $nome;
        $this->categoria = $categoria;
        $this->fornecedor = $fornecedor;
        $this->qtde_estoque = $qtde_estoque;
    }

    public function produto_vendido($qtde_vendida) {
        $this->qtde_estoque -= $qtde_vendida;
        return $this->qtde_estoque;
    }
}

// Criando objetos usando o construtor
$bolacha1 = new produtos("nikito", "doces", "vitarella", 220);
$feijao1 = new produtos("oliron", "mantimentos", "reserva nobre", 123);

// Vendendo produtos e mostrando o estoque atualizado
echo "Estoque bolacha após venda: " . $bolacha1->produto_vendido(10) . PHP_EOL;
echo "Estoque feijão após venda: " . $feijao1->produto_vendido(5) . PHP_EOL;
?>
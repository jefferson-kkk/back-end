<?php
class produtos{

public $nome;
public $categoria;
public $fornecedor;
public $qtde_estoque;

public function __construct($nome, $categoria, $fornecedor, $qtde_estoque){
$this->nome = $nome;
$this -> categoria =$categoria;
$this->fornecedor = $fornecedor;
$this->qtde_estoque = $qtde_estoque;

}

public function produto_vendido($qtde_vendida){
   $qtde_estoque = $this -> qtde_estoque - $qtde_vendida;
   return $qtde_estoque;     
  }
}

// $bolacha1= new produtos("nikito", "doces", "vitarella", 220);
$bolacha1 = new produtos();
$bolacha1 -> nome ="nikito";
$bolacha1 -> categoria ="doces";
$bolacha1 -> fornecedor = "vitarella";
$bolacha1 -> qtde_estoque = 220;


// $feijao = new produtos("oliron", "mantimentos", "reserva nobre", 123);
$feijao1 = new produtos();
$feijao1 -> nome = "oliron";
$feijao1 -> categoria ="mantimentos";
$feijao1 -> fornecedor = "reserva nobre";
$feijao1 -> qtde_estoque = 123;

$bolacha1 ->produto_vendido(10);
$feijao1 -> produto_vendido(5);

?>
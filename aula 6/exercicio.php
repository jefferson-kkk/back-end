<?php
class produto{

public $nome;
public $categoria;
public $fornecedor;
public $qtde_estoque;
}
$bolacha1 = new produto();
$bolacha1 -> nome ="nikito";
$bolacha1 -> categoria ="doces";
$bolacha1 -> fornecedor = "vitarella";
$bolacha1 -> qtde_estoque = 220;


// $feijao = new produtos("oliron", "mantimentos", "reserva nobre", 123);
$feijao1 = new produto();
$feijao1 -> nome = "oliron";
$feijao1 -> categoria ="mantimentos";
$feijao1 -> fornecedor = "reserva nobre";
$feijao1 -> qtde_estoque = 123;


$arroz1 = new produto();
$arroz1 -> nome = "prato fino";
$arroz1 -> categoria = "mantimentos";
$arroz1 -> fornecedor = "pirahy";
$arroz1 ->categoria =100;
?>
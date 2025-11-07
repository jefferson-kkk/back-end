<?php
namespace Aula_12\Produtos;
require_once "produtocrud.php";
require_once "produtosdao.php";

// Crie 8 objetos: Tomate, maça, queijo brie, iogurte grego, Guaraná Jesus, Bolacha Bono, Desinfetante Urca e Prestobarba Bic. Determine os preços por conta e os códigos de forma aleatória.

// Modifique o Desinfetante Ur                                                                                                                              ca para Desinfetante Barbarex; E ao menos 2 valores dos preços que voce determinou.

// Apague a maça e o Tomate dos produtos (aqui nao somos saudaveis).

//  Objeto da classe alunodao para gerenciar os metodos do crud


    $dao = new produtodao();

    // create

    // cria objetos
    $dao->criarProduto(new produto(1, "Tomate", 10.00));
    $dao->criarProduto(new produto(2, "Maça", 5.99));
    $dao->criarProduto(new produto(3, "Queijo Brie", 45.90));
    $dao->criarProduto(new produto(4, "Iogurte Grego", 8.50));
    $dao->criarProduto(new produto(5, "Guaraná Jesus", 7.99));
    $dao->criarProduto(new produto(6, "Bolacha Bono", 3.99));
    $dao->criarProduto(new produto(7, "Desinfetante Urca", 12.90));
    $dao->criarProduto(new produto(8, "Prestobarba Bic", 15.99));

    // read
                                                                                                                                                                                                                                                                                                                                                                                                                                                                       
    echo "\nlistagem inicial\n";
    foreach($dao->lerProduto() as $produtos){
        echo  "{$produtos->getCodigo()} - {$produtos->getNome()} - {$produtos->getPreco()}\n";
    }

// Update - modificando produtos
    $dao->atualizarProduto(7, "Desinfetante Barbarex", 14.99);  
    $dao->atualizarProduto(3, "Queijo Brie", 49.90);           
    $dao->atualizarProduto(6, "Bolacha Bono", 4.50);           

    echo "\nApós Atualização\n";
    foreach($dao->lerProduto() as $produtos){
        echo "{$produtos->getCodigo()} - {$produtos->getNome()} - R$ {$produtos->getPreco()}\n";
    }
    // delete

// Delete - removendo Maçã e Tomate
    $dao->excluirProduto(1);  // Remove Tomate
    $dao->excluirProduto(2);  // Remove Maçã

    echo "\nApós exclusão\n";
    foreach($dao->lerProduto() as $produtos){
        echo "{$produtos->getCodigo()} - {$produtos->getNome()} - R$ {$produtos->getPreco()}\n";
    }

?>


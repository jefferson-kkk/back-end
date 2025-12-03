<?php

require_once __DIR__ . '/../modelo/LivrosDAO.php';
require_once __DIR__ . '/../modelo/Livros.php';

class LivrosController {
    private $dao;

    public function __construct() {
        $this->dao = new LivroDAO();
    }

    public function ler() {
        return $this->dao->listarTodosLivros();
    }

    public function criarLivros($titulo, $autor, $ano_publicacao, $genero, $qntd_disponivel) {
        $livro = new Livros($titulo, $autor, $ano_publicacao, $genero, $qntd_disponivel);
        return $this->dao->criarLivro($livro);
    }

    public function atualizar($tituloOriginal, $novoTitulo, $autor, $anoPublicacao, $genero, $quantidadeDisponivel) {
        return $this->dao->atualizarLivro($tituloOriginal, $novoTitulo, $autor, $anoPublicacao, $genero, $quantidadeDisponivel);
    }

    public function deletar($titulo) {
        return $this->dao->excluirLivro($titulo);
    }

    public function buscarPorTitulo($titulo) {
        return $this->dao->buscarPorTitulo($titulo);
    }
}
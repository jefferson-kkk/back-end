<?php

require_once __DIR__ . '/../modelo/BebidaDAO.php';
require_once __DIR__ . '/../modelo/Bebida.php';

class BebidaController {
    private $dao;

    public function __construct() {
        $this->dao = new BebidaDAO();
    }

    public function ler() {
        return $this->dao->lerBebidas();
    }

    public function criar($nome, $categoria, $volume, $valor, $qtde) {
        $bebida = new Bebida($nome, $categoria, $volume, $valor, $qtde);
        $this->dao->criarBebida($bebida);
    }

    // CORREÇÃO: Método atualizar com todos os parâmetros necessários
    public function atualizar($nomeOriginal, $novoNome, $categoria, $volume, $valor, $qtde) {
        $this->dao->atualizarBebida($nomeOriginal, $novoNome, $categoria, $volume, $valor, $qtde);
    }

    public function deletar($nome) {
        $this->dao->excluirBebida($nome);
    }
}
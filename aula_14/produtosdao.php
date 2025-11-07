<?php
namespace Aula_12\produtos;
class produtodao{
    private $arquivo = "produtos.json";

    private $produtos = [];


public function __construct()
{
    if (file_exists($this->arquivo)){
        $conteudo = file_get_contents(($this->arquivo));
        $dados = json_decode( $conteudo, true);

        if (is_array($dados)) {
            foreach($dados as $codigo => $info){
                $this -> produtos [$codigo] = new produto(
                    $info['nome'],
                    $info['codigo'],
                    $info['preco']
                );

            } 
        }

    }
}
private function salvarEmArquivo() {
        
        // CORREÇÃO 1: Inicializa $dados como um array vazio
        $dados = []; 
        
        foreach($this->produtos as $codigo => $produtos){
            
            // CORREÇÃO 2: Salva usando o $id como chave (para manter o formato associativo)
            $dados[$codigo] = [
                'nome' => $produtos->getNome(),
                'codigo'=> $produtos->getCodigo(),
                'preco'=> $produtos->getPreco()
            ];
        }

        // CORREÇÃO 3: Corrigido o erro de digitação (flie -> file)
        file_put_contents($this->arquivo, json_encode($dados, JSON_PRETTY_PRINT));
    }

 
    public function criarProduto(produto $produtos) { // mudei nome do método e parâmetro
    $this->produtos[$produtos->getCodigo()] = $produtos;
    $this->salvarEmArquivo();
}

    public function lerProduto(){ 
     // método read  para ler informações de um objeto já existente
        return $this->produtos;
    }

    public function atualizarProduto($codigo, $novoNome, $novoPreco)
    { //método update para atualizar as informações de um obejeto já existente
        if (isset($this->produtos[$codigo])) {
            $this->produtos[$codigo]->setNome($novoNome);
            $this->produtos[$codigo]->setPreco($novoPreco);
            
            // CORREÇÃO 4: Chama o método para salvar
            $this->salvarEmArquivo(); 
        }
    }
    
    public function excluirProduto($codigo)
    { //método delete para excluir um objeto
        if (isset($this->produtos[$codigo])) {
            unset($this->produtos[$codigo]);

            // CORREÇÃO 4: Chama o método para salvar
            $this->salvarEmArquivo();
        }
    }
}

?>
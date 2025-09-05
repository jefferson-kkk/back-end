<?php
// modificadores de acesso
// existem 3 tipos: public,private,protected
// public calss nomeDoatributo: métodos e atributos públicos

// private calss nomeDoatributo: métodos e atributos privados para acesso somente dentro da classe. ultilizamos os getters e setters para acessalos

// protected class nomeDoatributo: métodos e atributos protegidos para cesso somente das classes e de suas classes filhas

// pacotes: sintaxe logo no inicio do código, que atribui de onde  os arquivos petrtencem, ou seja o caminho das pastas em que ela está contido. Exemplo:

// nameespce aula 09;

// caso tenham mais arquivos que formam o back de uma pagina web e possuem a mesma raiz, o nameespace será o mesmo(9)


namespace aula_9;

interface pagamento {  // interface de contrato de pagamento
    public function pagar($valor);
}

class cartaodecredito implements pagamento {
    public function pagar($valor){
        echo "pagamento realizado com cartão de crédito, valor: $valor\n";
    }
}

class pix implements pagamento {
    public function pagar($valor) {
        echo "pagamento realizado via PIX, valor: $valor\n";
    }
}
?>
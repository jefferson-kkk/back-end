<?php

// o termo polimorfismo significa "varias formas"
// associando isso a programção orientada a objetos, o conceito se trata de varias clases e suas instâncias(objetos) 
// respondendo a um mesmo metodo de formas diferentes. No exemplo de interface da aula_09, temo o método calcular área
// () que respomnde de forma diferente á calsse quadrado, a classe pentágono e a classe circulo. isso quer dizr que a função é a
// mesma - calcular - a área de forma geométrica - mas a operação muda de acordo com a figura.

//  crie um mtodo chammado "mover()", ondeele responde vaias formas diferentes, para classes: carro, avião, barco e elevador. dica 
// ultilize interfaces

interface movimento{
    public function mover();
}
class aviao implements movimento{
    public function mover(){
        echo"avião esta voando. \n";

    } 
}
class carro2 implements movimento{
    public function mover(){
        echo"o carro está se movendo. \n";
    }
}

class barco implements movimento{
    public function mover(){
        echo"o barco está navegando. \n";    }
}

class elevador implements movimento{
    public function mover(){
        echo"o elevador está subindo ou descendo. \n";
    }
}
$carro2 = new carro2();
echo $carro2-> mover();

$aviao = new aviao();
echo $aviao->mover();

$barco = new barco(); 
echo $barco->mover();

$elevador = new elevador();
echo $elevador->mover();    
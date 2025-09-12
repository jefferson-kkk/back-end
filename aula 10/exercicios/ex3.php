<?php

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
?>
<?php

interface movel{
    public function mover();
}

interface  abastecivel{
    public function abastecer($quantidade);
}

interface manutenivel{
    public function manutenivel();
}

class carro7 implements movel, abastecivel{
    public function mover(){
        echo "o carro está se movimentando. \n"; 
    }
    public function abastecer($quantidade){
        echo "imprime a quantidade abastecida. \n";
   
    }
}

class bicicleta implements movel, manutenivel{
    public function mover(){
        echo "a bicicleta está pedalando. \n";
    }
    public function manutenivel(){
        echo "a bicicleta foi lubrificada. \n";
    }
}

class onibus implements movel, abastecivel, manutenivel{
    public function mover(){
        echo "o ônibus está transportando passageiros. \n";
    }
    public function abastecer($quantidade){
        echo "a quantidade abastecida. \n";
    }
    public function manutenivel(){
        echo "o ônibus está passando por revisão. \n";
    }
}

$carro7 = new carro7();
echo $carro7->mover(), $carro7->abastecer($quantidade);

$bicicleta = new bicicleta();
echo $bicicleta->mover(), $bicicleta->manutenivel();

$onibus = new onibus();
echo $onibus->mover(), $onibus->abastecer($quantidade),$onibus->manutenivel();

?>
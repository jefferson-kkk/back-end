<?php


interface calculadora {
    public function somar();
}

class MinhaCalculadora implements calculadora {
    public $num1;
    public $num2;

    public function __construct($num1, $num2) {
        $this->num1 = $num1;
        $this->num2 = $num2;
    }

    public function somar() {
        return $this->num1 + $this->num2;
    }
}

// Exemplo de uso:
$calc = new MinhaCalculadora(5, 7);
echo $calc->somar(); // Saída: 12

// Segunda parte: calculadora para 3 números
interface calculadoraTres {
    public function somar();
}

class MinhaCalculadoraTres implements calculadoraTres {
    public $num1;
    public $num2;
    public $num3;

    public function __construct($num1, $num2, $num3) {
        $this->num1 = $num1;
        $this->num2 = $num2;
        $this->num3 = $num3;
    }

    public function somar() {
        return $this->num1 + $this->num2 + $this->num3;
    }
}

// Exemplo de uso:
$calcTres = new MinhaCalculadoraTres(2, 4, 6);
echo "\n" . $calcTres->somar(); // Saída: 12
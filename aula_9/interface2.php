<?php
interface forma {
    public function area();
}

class quadrado implements forma {
    private $lado;
    public function __construct($lado){
        $this->lado = $lado;
    }
    public function area(){
        return $this->lado * $this->lado;
    }
}

class circulo implements forma {
    private $raio;
    const PI = 3.14;
    public function __construct($raio){
        $this->raio = $raio;
    }
    public function area(){
        return self::PI * $this->raio * $this->raio;
    }
}

class pentagono implements forma {
    private $lado;
    private $apotema;
    public function __construct($lado, $apotema){
        $this->lado = $lado;
        $this->apotema = $apotema;
    }
    public function area(){
        return (5 * $this->lado * $this->apotema) / 2;
    }
}

class hexagono implements forma {
    private $lado;
    
    public function __construct($lado,){
        $this->lado=$lado;
}
public function area(){
    return(3 * (sqrt(3)) * ($this->lado * $this->lado))/2;
}
}

$quadrado = new quadrado(readline("Digite o valor do lado do quadrado: "));
echo "A área do quadrado é: " . $quadrado->area() . "\n";

$circulo = new circulo(readline("Digite o valor do raio do círculo: "));
echo "A área do círculo é: " . $circulo->area() . "\n";

$pentagono = new pentagono(
    readline("Digite o valor do lado do pentágono: "),
    readline("Digite o valor da apótema do pentágono: ")
);
echo "A área do pentágono é: " . $pentagono->area() . "\n";
$hexgono = new  hexagono(readline("digite o valor do lado do hexagono"))

?>
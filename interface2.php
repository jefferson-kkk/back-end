<?php
interface forma{
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

    class pentagono implements forma {
        private $lado;
        private $apotema;
        public function __construct($lado, $apotema){
            $this->lado = $lado;
            $this->apotema = $apotema;
        }
}

$quadrado = new quadrado(readline("Digite o valor do lado do quadrado: "));
echo "A área do quadrado é: " . $quadrado->area() . "\n";



$circulo = new circulo(readline("Digite o valor do raio do circulo:" ));
echo " A area do ciculo é: "  .$quadrado->area() . "\n";
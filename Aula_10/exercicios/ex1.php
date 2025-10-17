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
class retangulo implements forma{
    private $base;
    private $altura;
    public function __construct($base, $altura) {
    $this->base=$base;
    $this->altura=$altura;
    }
    public function area(){
    return $this->base * $this->altura;

    }
}

<?php
class carro {
    public $marca;
    public $modelo;
    public $ano;
    public $revisao;
    public $n_donos;

    public function __construct($marca, $modelo, $ano, $revisao,
     $n_donos) {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->ano = $ano;
        $this->revisao = $revisao;
        $this->n_donos = $n_donos;
    }
}
$carro1 = new carro("porche", "911", "2020", false, "3");
$carro2 = new carro("mitsubichi", "lancer", "1945", true, "1" );
$carro3 = new carro("chevrolet", "camaro", "2005", false, "4" );
$carro4 = new carro("fiat", "uno", "2021", true, "2");
$carro5 = new carro("volkswagen", "fusca", "1968", false, "5");
$carro6 = new carro("toyota", "supra-mk4", "2002", false, "6");
?>

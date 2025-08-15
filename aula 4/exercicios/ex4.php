<?php
$marca_carro1 = "bmw";
$ano_carro1 = 2022;
$ndonos_carro1 = 2;


$not = criarValor($marca_carro1, $ano_carro1 , $ndonos_carro1);
echo "$not";
function criarValor($marca,$ano,$ndonos){
    switch ($marca) {
        case "bmw":
        case "porche":
            $uso = date("Y") - $ano;
            $preco = (300000 - (300000 * (0.05* $ndonos)))-(3000*$uso);
            echo "O carro da marca $marca, do ano $ano, tem um valor de R$ $preco.";
            break;
        case "nissan":
            $uso = date("Y") - $ano;
            $preco = (70000 - (70000 * (0.05* $ndonos)))-(3000*$uso);
            echo "O carro da marca $marca, do ano $ano, tem um valor de R$ $preco.";
            break;
        case "BYD":
            $uso = date("Y") - $ano;
            $preco = (150000 - (150000 * (0.05* $ndonos)))-(3000*$uso);
            echo "O carro da marca $marca, do ano $ano, tem um valor de R$ $preco.";
            break;         
}
}
?>
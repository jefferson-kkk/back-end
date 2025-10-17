<?php
function criarValor($marca, $ano, $ndonos) {
    switch ($marca) {
        case "bmw":
        case "porche":
            $uso = date("Y") - $ano;
            $preco = (300000 - (300000 * (0.05 * $ndonos))) - (3000 * $uso);
            return "O carro da marca $marca, do ano $ano, tem um valor de R$ $preco.";
        case "nissan":
            $uso = date("Y") - $ano;
            $preco = (70000 - (70000 * (0.05 * $ndonos))) - (3000 * $uso);
            return "O carro da marca $marca, do ano $ano, tem um valor de R$ $preco.";
        case "BYD":
            $uso = date("Y") - $ano;
            $preco = (150000 - (150000 * (0.05 * $ndonos))) - (3000 * $uso);
            return "O carro da marca $marca, do ano $ano, tem um valor de R$ $preco.";
        default:
            return "Marca não cadastrada.";
    }
}
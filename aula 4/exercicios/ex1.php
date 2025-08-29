
<?php
$escolha = (int) readline("escolha um carro de 1 a 4: ");

switch($escolha){
    case 1:
        $modelo_carro1="Versa";
        $marca_carro1="Nissan";
        $ano_carro1=2020;
        $revisao_carro1=true;
        $ndonos_carro1=2;
        $not = exibirCarro($modelo_carro1, $marca_carro1, $ano_carro1, $revisao_carro1, $ndonos_carro1);
        echo $not;
        break;
    case 2:
        $modelo_carro2= "M5";
        $marca_carro2="BMW";
        $ano_carro2=2018;
        $revisao_carro2=false;
        $ndonos_carro2=2;
        $not = exibirCarro($modelo_carro2, $marca_carro2, $ano_carro2, $revisao_carro2, $ndonos_carro2);
        echo $not;
        break;
    case 3:
        $modelo_carro3="911";
        $marca_carro3="Porche";
        $ano_carro3=2026;
        $revisao_carro3=false;
        $ndonos_carro3=1;
        $not = exibirCarro($modelo_carro3, $marca_carro3, $ano_carro3, $revisao_carro3, $ndonos_carro3);
        echo $not;
        break;
    case 4:
        $modelo_carro4="Dolphin";
        $marca_carro4="BYD";
        $ano_carro4=2023;
        $revisao_carro4=false;
        $ndonos_carro4=1;
        $not = exibirCarro($modelo_carro4, $marca_carro4, $ano_carro4, $revisao_carro4, $ndonos_carro4);
        echo $not;
        break;
    default:
        echo "carro nao cadastrado";
        break;
}

function exibirCarro($modelo, $marca, $ano, $revisao, $donos) {
    if ($revisao == true){
        return "o carro: $modelo, da marca: $marca, do ano: $ano, passou por revisao e teve $donos donos";
    } else {
        return "o carro: $modelo, da marca: $marca, do ano: $ano, não passou por revisao e teve $donos donos";
    }
}
?>
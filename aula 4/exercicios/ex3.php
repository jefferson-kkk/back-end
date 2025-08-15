<?php
$revisao_carro1 = false;
$revisao_carro1 = "15/05/2023";    
$modelo_carro1 = "Versa";
$ano_carro1 = 2019;

$escolha = (int) readline("Escolha uma opção:\n1. Revisão do carro Versa\n2. Revisão do carro M5\n3. Revisão do carro Civic\n4. Revisão do carro 911\n");

switch ($escolha){
    case"1":
        $modelo_carro1 = "Versa";
        $ano_carro1 = 2020;
        $revisao_carro1 = true;
        $exibir == exibirRevisaoCarro($modelo_carro1, $ano_carro1, $revisao_carro1, "15/05/2023");
        break;
        case "2":
        $modelo_carro2 = "M5";  
        $ano_carro2 = 2018;
        $revisao_carro2 = false;
        $exibir == exibirRevisaoCarro($modelo_carro2, $ano_carro2, $revisao_carro2, "20/06/2023");
      case "3":
        $modelo_carro3 = "Civic";
        $ano_carro3 = 2021;
        $revisao_carro3 = true;
        $exibir == exibirRevisaoCarro($modelo_carro3, $ano_carro3, $revisao_carro3, "10/07/2023");
        break;
        case "4":   
            $modelo_carro4 = "911";
            $ano_carro4 = 2018;
            $revisao_carro4 = true;
            $exibir == exibirRevisaoCarro($modelo_carro4, $ano_carro4, $revisao_carro4, "05/08/2023");
            break;
            default:
            echo "Opção inválida. Por favor, escolha uma opção válida.";
            exit;
}
function exibirRevisaoCarro($modelo,$ano,$revisao,$dia){
    if($revisao == false && $ano < "2022"){
        echo "o carro $modelo do ano $ano  não passou por revisão e deverá paassar no dia $dia.";
    }else{
        echo "O carro $modelo do ano $ano passou por revisão no dia $dia.";
    }
} $exibir == exibirRevisaoCarro($modelo_carro1, $ano_carro1, $revisao_carro1, "15/05/2023");
?>
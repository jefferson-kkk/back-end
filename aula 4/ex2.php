<?php
  $modelo_carro1="Versa";
        $marca_carro1="Nissan";
        $ano_carro1=2020;
        $revisao_carro1=true;
        $ndonos_carro1=2;
        $tempo_carro1= "3 anos";
        
function seminNovo($marca,$ano,$tempo,$revisao){
    if($tempo =="3anos" && $revisao == true){
        return "O carro da marca $marca, do ano $ano, é considerado seminovo.";
    }else{
        return "O carro da marca $marca, do ano $ano, não é considerado seminovo.";
    }
} 
?>
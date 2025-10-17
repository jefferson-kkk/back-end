<?php
$modelo_carro1='Versa';
$modelo_carro1='Nissan';
$ano_carro1=2020;
$revisao_carro1= true;
$ndonos_carro1= 2;

$modelo_carro2='M5';
$modelo_carro2='BMW';
$ano_carro2=2018;
$revisao_carr2=false;
$ndonos_carro2=2;

$modelo_carro3='911';
$modelo_carro3='Porche';
$ano_carro3=2026;
$revisao_carro3=false;
           
$modelo_carr4='Dolphin';
$modelo_carro4='BYD';
$ano_carro4=2023;
$revisao_carro4=false;
$ano_carro4= 1;

 function passouRevisao ($revisaof){
     $revisao = false;
     return $revisao;
     }
     $revisao_carro4= passouRevisao($revisao_carro4);
              
function novoDono ($donos,$donos2){
   return $donos + 1;
}
$ndonos_carro4 = novoDono($ndonos_carro4,$donos2);

?>
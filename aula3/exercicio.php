<!-- verificação idade -->
<?php
$idade = (int) readline("digite sua idade:");
if ($idade >= 18) {
    echo "você é maior de idade";
} else {
    echo "você é menor de idade";
}
?>

<!-- nota -->
<?php
$nota = 9;
if ($nota >= 9){
echo "exelente";
}elseif ($nota >= 7){
echo "bom";
}else{
    echo "reprovao";
}?>

<!-- Dia da Semana -->
<?php
$dia = "1";
switch ($dia) {
case "1":
echo "Hoje é domingo!";
break;
case "2";
echo "Hoje é segunda-feira!";
break;
case "3":
echo "Hoje é terça-feira!";
break;
case "4";
echo "Hoje é quarta-feira!";
break;
case "5";
echo "Hoje é quinta-feira!";
break;
case "6";
echo "Hoje é sexta-feira!";
break;
case "7";
echo "Hoje é sábado!";
break;
default:
echo "Dia não reconhecido.";
}
?>

<!-- Calculadora Simples -->
p<?php
$num1 = (int) readline(prompt:"digite o primeiro numero:");
$num2 = (int) readline(prompt:"digite o segundo numero;");
$operador = "+";
switch($operador0) {
    case "+";
        echo "A soma é: " . ($num1 + $num2);
        break;
        case "-";
        echo "A subtração é: " . ($num1 - $num2);
        break;
        case "*";
        echo "A multiplicação é: " . ($num1 * $num2);
        break;
        case"/";
        echo "A divisão é: " . ($num1 / $num2);
        default:
        echo "operador invalido";
}
?>

<!-- Contagem Progressiva -->
<?php
for ($i = 1; $i <= 5; $i++) {
echo "Número: $i
";
}
?>

<!-- Contagem Regressiva -->
<?php
$num = (int) readline(prompt:"Digite um número:");
for ($i = $num; $i >= 1; $i--) {
echo "Contagem regressiva: $i
";
}
?>

<!-- Números Pares -->
<?php
$num = (int) readline(prompt:"Digite um número:");
for ($i = $num; $i >= 1; $i--) {
if ($i % 2 == 0) {
        echo "Número par: $i\n";
    }
}
?>


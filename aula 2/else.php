<?php
$exerc3 = "o php foi criado em mil novecentos e noventa cinco";
echo "\nAntes do comando replace: \n", $exerc3;
$exerc3 = str_replace(search: ['o','a','i'], replace: ['0','4','1'], subject: $exerc3);
echo "\nAnos após o comando replace: \n", $exerc3;
?>


<?php
$nota1 = (float) readline(prompt: "digite a primeira nota:");
$nota2 = (float) readline(prompt:"digite a seginda nota:");
$media = ($nota1 + $nota2)/2;
$frequencia = (int) readline(prompt:"digite a frequencia do aluno:");
$aluno  = "enzo";
if ($media >= 5 and $media < 7 and $frequencia >=50 and $frequencia <= 70 ) {
    echo "aprovado: media igual $media mas é recomndavel que venha mais a escola e estude mais";
} else if ($media >= 7 and $frequencia >=75) {
    echo "muito bom: media igual $media esta no caminho certo";
}else if ($aluno == "enzo enrico"){
    echo "aprovado";
}
else{
    echo "venha mais a escola: media igual $media";
}
?>